<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionReport;
use App\Models\ProductionIssue;
use Validator;
use App\Models\ProductionReportUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;



class ProductionReportController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // values: 7days, 30days, last_month, last_year
        $search = $request->query('search');
        $sort = $request->query('sort', 'production_date'); // default sort
        $direction = $request->query('direction', 'desc');

        $query = ProductionReport::query();

        if ($filter === '7days') {
            $query->where('created_at', '>=', now()->subDays(7));
        } elseif ($filter === '30days') {
            $query->where('created_at', '>=', now()->subDays(30));
        } elseif ($filter === 'last_month') {
            $query->whereMonth('created_at', '=', now()->subMonth()->month)
                ->whereYear('created_at', '=', now()->subMonth()->year);
        } elseif ($filter === 'last_year') {
            $query->whereYear('created_at', '=', now()->subYear()->year);
        }

        // Search by production date (exact or partial match)
        if (!empty($search)) {
            $query->whereDate('production_date', '=', $search);
        }

        // Sorting
        if (in_array($sort, ['sku', 'line', 'created_at', 'status'])) {
            $query->orderBy($sort, $direction);
        }

        $reports = $query->orderBy('production_date', 'desc')->paginate(10); // Paginated results
        
        return view('report.production_report', compact('reports', 'filter', 'search', 'sort', 'direction'));
    }
    public function view_report($id) {
        $reports = ProductionReport::findOrFail($id);
        return view('report/view_report', compact('reports'));
    }
    public function add_production()
    {
        return view('report.add_production');
    }
    public function productionreport_post(Request $request)
    {
        $validated = $request->validate([
            'production_date' => 'required|date',
            'line' => 'required|integer|max:5',
            'shift' => 'required|string|max:20',

            'ac1' => 'nullable|numeric',
            'ac2' => 'nullable|numeric',
            'ac3' => 'nullable|numeric',
            'ac4' => 'nullable|numeric',

            'manpower_present' => 'required|integer|min:0',
            'manpower_absent' => 'required|integer|min:0',

            'sku' => 'required|string|max:20',
            'fbo_fco' => 'required|string|max:20',
            'lbo_lco' => 'required|string|max:20',
            'total_outputCase' => 'required|integer|min:0',

            
            // Filling Line
            'fl_bottle_code' => 'nullable|string|max:50',
            'fl_filler_speed' => 'nullable|numeric',
            'fl_opplabels' => 'nullable|integer|min:0',
            'fl_shrinkfilm' => 'nullable|integer|min:0',
            'fl_labeler_speed' => 'nullable|numeric',
            'fl_caps' => 'nullable|integer|min:0',
            'fl_bottle_pcs' => 'nullable|integer|min:0',
            'fl_total_downtime' => 'nullable|string|max:50',

            // Blow Molding
            'bm_output' => 'nullable|numeric',
            'bm_speed' => 'nullable|numeric',
            'bm_preform' => 'nullable|integer|min:0',
            'bm_bottle' => 'nullable|integer|min:0',

            // Issue logs - as arrays
            'materials' => 'nullable|array',
            'description' => 'nullable|array',
            'minutes' => 'nullable|array',
            'materials.*' => 'nullable|string|max:100',
            'description.*' => 'nullable|string|max:255',
            'minutes.*' => 'nullable|numeric|min:0',

            // QA and Line Rejects
            'qa_ozone' => 'nullable|string|max:20',
            'qa_sampleSKU' => 'nullable|string|max:50',
            'qa_total' => 'nullable|integer|min:0',
            'qa_wlabel' => 'nullable|integer|min:0',
            'qa_wolabel' => 'nullable|integer|min:0',

            'lr_sku' => 'nullable|string|max:50',
            'lr_noCaps' => 'nullable|integer|min:0',
            'lr_bandDamaged' => 'nullable|integer|min:0',
            'lr_lowFill' => 'nullable|integer|min:0',
            'lr_scbottle' => 'nullable|integer|min:0',
            'lr_bPinHole' => 'nullable|integer|min:0',
            'lr_visibleGlue' => 'nullable|integer|min:0',
            'lr_smBottle' => 'nullable|integer|min:0',
            'lr_lRedTape' => 'nullable|integer|min:0',
            'lr_dentedB' => 'nullable|integer|min:0',

            'status' => 'nullable|string|max:20'
        ]);

        $report = ProductionReport::create($validated);

        // Save issues
        if ($request->has('materials')) {
            foreach ($request->materials as $index => $material) {
                ProductionIssue::create([
                    'production_report_id' => $report->id,
                    'material' => $material,
                    'description' => $request->description[$index] ?? null,
                    'minutes' => $request->minutes[$index] ?? null,
                ]);
            }
        }

        return redirect('report/production_report')->with('success', 'Production report added successfully.');
    }
    public function edit($id)
    {
        $report = ProductionReport::findOrFail($id);
        return view('report.edit_report', compact('report'));
    }
    public function edit_report(Request $request, $id)
    {
        $report = ProductionReport::findOrFail($id);

        $validated = $request->validate([
            'production_date' => 'required|date',
            'line' => 'required|integer|max:5',
            'shift' => 'required|string|max:20',

            'ac1' => 'nullable|numeric',
            'ac2' => 'nullable|numeric',
            'ac3' => 'nullable|numeric',
            'ac4' => 'nullable|numeric',

            'manpower_present' => 'required|integer|min:0',
            'manpower_absent' => 'required|integer|min:0',

            'sku' => 'required|string|max:20',
            'fbo_fco' => 'required|string|max:20',
            'lbo_lco' => 'required|string|max:20',
            'total_outputCase' => 'required|integer|min:0',

            
            // Filling Line
            'fl_bottle_code' => 'nullable|string|max:50',
            'fl_filler_speed' => 'nullable|numeric',
            'fl_opplabels' => 'nullable|integer|min:0',
            'fl_shrinkfilm' => 'nullable|integer|min:0',
            'fl_labeler_speed' => 'nullable|numeric',
            'fl_caps' => 'nullable|integer|min:0',
            'fl_bottle_pcs' => 'nullable|integer|min:0',
            'fl_total_downtime' => 'nullable|string|max:50',

            // Blow Molding
            'bm_output' => 'nullable|numeric',
            'bm_speed' => 'nullable|numeric',
            'bm_preform' => 'nullable|integer|min:0',
            'bm_bottle' => 'nullable|integer|min:0',

            // Issue logs - as arrays
            'materials' => 'nullable|array',
            'description' => 'nullable|array',
            'minutes' => 'nullable|array',
            'materials.*' => 'nullable|string|max:100',
            'description.*' => 'nullable|string|max:255',
            'minutes.*' => 'nullable|numeric|min:0',

            // QA and Line Rejects
            'qa_ozone' => 'nullable|string|max:20',
            'qa_sampleSKU' => 'nullable|string|max:50',
            'qa_total' => 'nullable|integer|min:0',
            'qa_wlabel' => 'nullable|integer|min:0',
            'qa_wolabel' => 'nullable|integer|min:0',

            'lr_sku' => 'nullable|string|max:50',
            'lr_noCaps' => 'nullable|integer|min:0',
            'lr_bandDamaged' => 'nullable|integer|min:0',
            'lr_lowFill' => 'nullable|integer|min:0',
            'lr_scbottle' => 'nullable|integer|min:0',
            'lr_bPinHole' => 'nullable|integer|min:0',
            'lr_visibleGlue' => 'nullable|integer|min:0',
            'lr_smBottle' => 'nullable|integer|min:0',
            'lr_lRedTape' => 'nullable|integer|min:0',
            'lr_dentedB' => 'nullable|integer|min:0',

            'status' => 'nullable|string|max:20'
        ]);

        $report->fill($validated);

        // Delete old issues first
        $report->issues()->delete();

        // Save new issues
        if ($request->has('materials')) {
            foreach ($request->materials as $index => $material) {
                if ($material || ($request->description[$index] ?? null) || ($request->minutes[$index] ?? null)) {
                    ProductionIssue::create([
                        'production_report_id' => $report->id,
                        'material' => $material,
                        'description' => $request->description[$index] ?? null,
                        'minutes' => $request->minutes[$index] ?? null,
                    ]);
                }
            }
        }

        $report->save(); // ✅ Don't call update() here

        // Save update history
        ProductionReportUpdate::create([
            'production_report_id' => $report->id,
            'user_id' => Auth::id(),   // current logged-in user id
            'status' => $request->input('status', 'Edited'),  // or however you want to handle status
            'remarks' => $request->input('remarks'),  // optional remarks from the form
        ]);

        return redirect()->route('report.edit_report', ['id' => $report->id])->with('success', 'Production report updated successfully!');
    }
    public function verify(Request $request)
    {
        $request->validate([
            'production_report_id' => 'required|exists:production_reports,id',
            'status' => 'required|in:Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        // Create update entry
        ProductionReportUpdate::create([
            'production_report_id' => $request->production_report_id,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        // Optionally: update main report status too
        ProductionReport::where('id', $request->production_report_id)
            ->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Report status updated successfully.');
    }
    public function downloadPDF(Request $request)
    {
        $report = ProductionReport::findOrFail($request->report_id);

        $pdf = Pdf::loadView('pdf.production_report', compact('report'));

        // Format file name: Production - YYYY-MM-DD.pdf
        $formattedDate = \Carbon\Carbon::parse($report->production_date)->format('Y-m-d');
        $fileName = 'Production - ' . $formattedDate . '.pdf';

        return $pdf->download($fileName);
    }

}

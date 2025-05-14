<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionReport;
use App\Models\ProductionIssue;
use Validator;
use App\Models\ProductionReportUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;



class ProductionReportController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // values: 7days, 30days, last_month, last_year
        $search = $request->query('search');

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
        $reports = $query->orderBy('production_date', 'desc')->paginate(10); // Paginated results
        
       return view('report.production_report', compact('reports', 'filter', 'search'));
    }
    public function view_report($id) {
        $reports = ProductionReport::findOrFail($id);
        return view('report/view_report', compact('reports'));
    }
    public function addProduction()
    {
        return view('report.addProduction');
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
}

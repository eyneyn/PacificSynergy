@extends('layouts.navbar')

@section('content')
    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{url('report/production_report')}}" class="inline-flex items-center text-xs font-medium text-blue-800 hover:text-blue-600">
                    <svg class="w-2 h-2  me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Production Reports
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-2 h-2 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="" class="disabled-link ms-1 text-xs font-medium text-blue-800 hover:text-blue-600 md:ms-2">View Production Report</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 justify-between sm:space-y-0 items-center">
        <!-- Status Section -->
        <div class="flex items-center space-x-2">
            <h2 class="text-sm font-medium text-blue-950">Status:</h2>
            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                @if($reports->status === 'Verified') bg-green-100 text-green-800 
                @elseif($reports->status === 'Pending') bg-yellow-100 text-yellow-800 
                @else bg-red-100 text-red-800 
                @endif">
                {{ $reports->status }}
            </span>
        </div>
        <!-- Edit, verify, Export -->
        <div class="flex justify-end gap-1">
            @if (auth()->user()->is_role != 0)
            <!-- Trigger Button: Only visible if NOT Approved -->
            @if ($reports->status !== 'Approved')
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                    class="flex items-center gap-2 px-4 py-2 bg-transparent border border-[#444d90] hover:bg-[#444d90] text-blue-950 hover:text-white text-sm font-medium rounded-lg shadow-sm transition duration-200">
                    Verify Report
                </button>
            @endif
                <!-- Modal -->
                <div id="popup-modal" tabindex="-1"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden px-4 py-6 overflow-y-auto">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md relative p-6 transition-all duration-300">
                        <!-- Close Button -->
                        <button type="button"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>

                        <!-- Form -->
                        <form method="POST" action="{{ route('report.verify') }}" class="space-y-5">
                            @csrf
                            <input type="hidden" name="production_report_id" value="{{ $reports->id }}">

                            <!-- Icon -->
                            <div class="text-center">
                                <svg class="mx-auto text-gray-400 w-12 h-12 dark:text-gray-300 mb-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                    Update Report Status
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Select the final status and add optional remarks.
                                </p>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select Status</label>
                                <select name="status" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#444d90] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                    <option value="" disabled selected>Select status</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Rejected">Reject</option>
                                </select>
                            </div>

                            <!-- Remarks -->
                            <div>
                                <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Remarks</label>
                                <textarea name="remarks" rows="3" placeholder="Optional remarks..."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#444d90] dark:bg-gray-700 dark:text-white dark:border-gray-600"></textarea>
                            </div>

                            <!-- Actions -->
                            <div class="flex justify-end gap-3 pt-3">
                                <button type="button" data-modal-hide="popup-modal"
                                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-600">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-5 py-2.5 text-sm font-medium text-white bg-[#444d90] hover:bg-[#2c366d] rounded-lg transition">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- Edit -->
            <a href="{{ route('report.edit_report', ['id' => $reports->id]) }}" class="flex items-center gap-2 px-4 py-2 bg-transparent border border-[#444d90] hover:bg-[#444d90] text-blue-950 hover:text-white text-sm font-medium rounded-lg shadow-sm transition duration-200">
                Edit Report
            </a>
            @endif
            <!-- Export -->
            <div>
                <form method="POST" action="{{ route('download-pdf') }}" target="_blank">
                    @csrf
                    <input type="hidden" name="report_id" value="{{ $reports->id }}">
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2 bg-[#323B76] border border-[#444d90] hover:bg-[#444d90] text-white text-sm font-medium rounded-lg shadow-sm transition duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 20h14v-2H5m14-9h-5V3H10v6H5l7 7 7-7z" />
                        </svg>
                        Export to PDF
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg p-10 mt-5 mb-10 transition-all duration-300 hover:shadow-xl">

        <!-- STEP 1: General Info -->
            <div class="space-y-6 text-blue-950">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="production_date" class="block mb-1 text-sm font-medium">Production Date</label>
                        <input disabled value="{{$reports->production_date}}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="line" class="block mb-1 text-sm font-medium">Line #</label>
                        <input disabled value="{{$reports->line}}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="shift" class="block mb-1 text-sm font-medium">Shift</label>
                        <input disabled value="{{$reports->shift}}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="ac" class="block mb-1 text-sm font-medium">AC Temperature</label>
                        <div class="grid grid-cols-4 gap-1">
                            <input disabled value="{{$reports->ac1}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input disabled value="{{$reports->ac2}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input disabled value="{{$reports->ac3}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input disabled value="{{$reports->ac4}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                    <div>
                        <label for="manpower" class="block mb-1 text-sm font-medium">Manpower</label>
                        <div class="grid grid-cols-2 gap-1">
                        <input disabled value="{{$reports->manpower_present}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        <input disabled value="{{$reports->manpower_absent}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                </div>
                <!-- Summary Row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="sku" class="block mb-1 text-xs font-medium">Running SKUs</label>
                        <input disabled value="{{$reports->sku}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="fbo_fco" class="block mb-1 text-xs font-medium">FBO/FCO(H)</label>
                        <input disabled value="{{$reports->fbo_fco}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="lbo_lco" class="block mb-1 text-xs font-medium">LBO/LCO(H)</label>
                        <input disabled value="{{$reports->lbo_lco}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="total_outputCase" class="block mb-1 text-xs font-medium">Total Output Cases</label>
                        <input disabled value="{{$reports->total_outputCase}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                </div>
            </div>

                <!-- STEP 2: Filling & Molding -->
            <div class="space-y-6 text-blue-950">
            <div class="relative grid grid-cols-1 md:grid-cols-2 mt-7 gap-6">
                <!-- Filling Line -->
                <div class="space-y-4 pr-4">
                    <h2 class="font-bold text-lg">Filling Line</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div class="grid grid-cols-2 gap-1 mt-1">
                            <div> 
                                <label for="fl_filler_speed" class="block text-sm font-bold invisible">Placeholder</label>
                                <label for="fl_bottle_code" class="block text-xs font-medium">Bottle Code</label>
                                <input disabled value="{{$reports->fl_bottle_code}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div>
                                <label for="fl_filler_speed" class="block text-sm font-bold">Speed (Bottle per hour)</label>
                                <label for="fl_filler_speed" class="block text-xs font-medium">Filler Speed</label>
                                <input disabled value="{{$reports->fl_filler_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">RM Rejects (Qty/Code)</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_opplabels" class="text-xs w-1/2 text-right">Opp/Labels (pcs)</label>
                                    <input disabled value="{{$reports->fl_opplabels}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_shrinkfilm" class="text-xs w-1/2 text-right">Shrinkfilm (pcs)</label>
                                    <input disabled value="{{$reports->fl_shrinkfilm}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-1 mt-1">
                            <div>
                                <label for="fl_labeler_speed" class="block text-xs font-medium">Opp/Labeler Speed</label>
                                <input disabled value="{{$reports->fl_labeler_speed}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div class="grid grid-cols-3 gap-1 mt-1">
                                <div>
                                    <label for="fl_caps" class="text-xs w-1/2 text-right">Caps (pcs)</label>
                                    <input disabled value="{{$reports->fl_caps}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div>
                                    <label for="fl_bottle_pcs" class="text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input disabled value="{{$reports->fl_bottle_pcs}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div>
                                    <label for="fl_total_downtime" class="text-xs w-1/2 text-right font-bold">Total Downtime</label>
                                    <input disabled value="{{$reports->fl_total_downtime}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blow Molding -->
                <div class="space-y-4 pl-4">
                <h2 class="font-bold text-lg">Blow Molding</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="bm_output" class="block text-sm font-medium">Blow Molding Output</label>
                                <input disabled value="{{$reports->bm_output}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div>
                                <label for="bm_speed" class="block text-sm font-medium">Speed (Bottles/hour)</label>
                                <input disabled value="{{$reports->bm_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold">Blow Molding Rejects</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_preform" class="text-xs w-1/2 text-right">Preform (pcs)</label>
                                    <input disabled value="{{$reports->bm_preform}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_bottle" class="text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input disabled value="{{$reports->bm_bottle}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

             <!-- STEP 3: Issues -->
                <div class="space-y-4 mt-7 text-blue-950">
                    <h2 class="font-bold text-lg">Issues / Downtime / Remarks</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="material" class="block mb-1 text-sm font-medium">Material</label>
                        <input disabled value="{{$reports->material}}" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="description" class="block mb-1 text-sm font-medium">Description</label>
                        <input disabled value="{{$reports->description}}" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="minutes" class="block mb-1 text-sm font-medium">Minutes</label>
                        <input disabled value="{{$reports->minutes}}" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    </div>
                </div>

                <!-- STEP 4: QA / QC -->
                <div class="space-y-4 mt-7 text-blue-950">
                    
                <!-- QA -->
                <div class="space-y-4">
                <div class="grid grid-cols-1 gap-3">
                    <div class="grid md:grid-cols-12 gap-1 items-end">
                        <!-- QA Remarks -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg">QA Remarks</h2>
                            <label for="qa_ozone" class="text-xs w-1/2 text-right">Ozone</label>
                            <input disabled value="{{$reports->qa_ozone}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <!-- QA Sample -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg">QA Sample</h2>
                            {{-- <label class="block text-sm font-bold">QA Sample</label> --}}
                            <label for="qa_sampleSKU" class="text-xs w-1/2 text-right">SKU's</label>
                            <input disabled value="{{$reports->qa_sampleSKU}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_total" class="text-xs w-1/2 text-right">Total (in pcs)</label>
                            <input disabled value="{{$reports->qa_total}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wlabel" class="text-xs w-1/2 text-right">With label (in pcs)</label>
                            <input disabled value="{{$reports->qa_wlabel}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wolabel" class="text-xs w-1/2 text-right">Without label (in pcs)</label>
                            <input disabled value="{{$reports->qa_wolabel}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                    
                    <!-- Line QC Rejects -->
                    <h2 class="font-bold text-lg mt-6">Line QC Rejects </h2>
                    <div class="grid md:grid-cols-10 gap-2 items-end">
                        <div class="md:col-span-2">
                            <label for="lr_sku" class="text-xs w-1/2 text-right">SKU's</label>
                            <input disabled value="{{$reports->lr_sku}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_noCaps" class="text-xs w-1/2 text-right">No caps</label>
                            <input disabled value="{{$reports->lr_noCaps}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_bandDamaged" class="text-xs w-1/2 text-right">Tampered band damaged</label>
                            <input disabled value="{{$reports->lr_bandDamaged}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lowFill" class="text-xs w-1/2 text-right">Low Fill</label>
                            <input disabled value="{{$reports->lr_lowFill}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_scbottle" class="text-xs w-1/2 text-right">Scratched on Bottle</label>
                            <input disabled value="{{$reports->lr_scbottle}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-10 gap-2 items-end">
                        <div class="md:col-span-2">
                            <label for="lr_bPinHole" class="text-xs w-1/2 text-right">Bottle with Pin Hole</label>
                            <input disabled value="{{$reports->lr_bPinHole}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_visibleGlue" class="text-xs w-1/2 text-right">Visible Glue</label>
                            <input disabled value="{{$reports->lr_visibleGlue}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_smBottle" class="text-xs w-1/2 text-right">Sticky/Messy Bottle</label>
                            <input disabled value="{{$reports->lr_smBottle}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lRedTape"class="text-xs w-1/2 text-right">Label with Red Tape</label>
                            <input disabled value="{{$reports->lr_lRedTape}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_dentedB"class="text-xs w-1/2 text-right">Dented Bottle</label>
                            <input disabled value="{{$reports->lr_dentedB}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                </div>
                </div>

            </div>
    </div>

    <div class="w-3xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg px-8 py-10 mt-5 mb-10 transition-all duration-300 hover:shadow-xl">

        <!-- Record Information -->
        <div class="w-full w-mx-lg text-blue-950">
                <h3 class="text-lg font-semibold mb-2">Record Information</h3>
                <table class="min-w-full text-sm border border-[#0F1C39] rounded-md">
                    <thead class="bg-[#f1f5f9]">
                        <tr>
                            <th class="text-left px-4 py-2 border-b border-[#0F1C39]">Date</th>
                            <th class="text-left px-4 py-2 border-b border-[#0F1C39]">ID</th>
                            <th class="text-left px-4 py-2 border-b border-[#0F1C39]">Status</th>
                            <th class="text-left px-4 py-2 border-b border-[#0F1C39]">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">{{$reports->created_at}}</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">{{$reports->user->employee_number}}</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">{{$reports->status}}</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]"></td>
                        </tr>
                          <!-- Loop through update history -->
                        @foreach ($reports->updates as $update)
                            <tr>
                                <td class="px-4 py-2 border-b border-[#0F1C39]">
                                    {{ \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i') }}
                                </td>
                                <td class="px-4 py-2 border-b border-[#0F1C39]">
                                    {{ $update->user->employee_number ?? '—' }}
                                </td>
                                <td class="px-4 py-2 border-b border-[#0F1C39]">
                                    {{ $update->status }}
                                </td>
                                <td class="px-4 py-2 border-b border-[#0F1C39]">
                                    {{ $update->remarks ?? '—' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
@endsection
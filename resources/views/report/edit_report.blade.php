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
                    <a href="" class="disabled-link ms-1 text-xs font-medium text-blue-800 hover:text-blue-600 md:ms-2">Edit Production Report</a>
                </div>
            </li>
        </ol>
    </nav>

    <form id="update-form" method="POST" action="{{route('report.edit_report', ['id' => $report->id])}}" enctype="multipart/form-data" class="">
    @csrf
    @method('PUT')

        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 justify-between sm:space-y-0 items-center">
        <!-- Back Button -->
        <div class="flex">
            <a href="{{ route('report.view_report', ['id' => $report->id]) }}"
                class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-[#242c67] border border-[#242c67] hover:bg-[#f1f3ff] shadow-sm transition-all duration-300">
                <svg class="w-5 h-5 text-[#242c67]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="text-sm">Back</span>
            </a>
        </div>
        <div class="flex justify-end gap-1">
                <!-- Reset button -->
                <button type="reset"
                    class="cursor-pointer text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                    {{ __('Reset') }}
                </button>

            <!-- Submit button -->
            <button type="button" data-modal-target="confirm-update-modal" data-modal-toggle="confirm-update-modal"
                class="cursor-pointer text-white bg-[#323B76] border border-[#444d90] hover:bg-[#444d90] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                {{ __('Save') }}
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirm-update-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirm-update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none"
                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01M4.929 4.929a10 10 0 1014.142 0 10 10 0 00-14.142 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are you sure you want to update the form?
                    </h3>
                    <button type="button" onclick="document.getElementById('update-form').submit();"
                        class="text-white bg-[#0F1C39] hover:bg-[#0d1730] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, update
                    </button>
                    <button data-modal-hide="confirm-update-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg px-10 py-5 mt-5 mb-10 transition-all duration-300 hover:shadow-xl">

    @include('layouts._message')

        <!-- STEP 1: General Info -->
            <div class="space-y-6 mt-3">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="production_date" class="text-blue-950 block mb-1 text-sm font-medium">Production Date</label>
                        <input name="production_date" readonly value="{{$report->production_date}}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="line" class="block mb-1 text-sm font-medium">Line #</label>
                            <select name="line" id="line" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent">
                            <!-- Always show the current value first -->
                                <option value="{{ $report->line }}">{{ $report->line }}</option>

                                <!-- Show other options only if they are different from the current value -->
                                @foreach([1, 2] as $line)
                                    @if($line != $report->line)
                                        <option value="{{ $line }}">{{ $line }}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
                    <div>
                        <label for="shift" class="block mb-1 text-sm font-medium">Shift</label>
                            <select name="shift" id="shift" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent">
                                <option value="{{$report->shift}}">{{$report->shift}}</option>
                            </select>                    
                    </div>
                    <div>
                        <label for="ac" class="text-blue-950 block mb-1 text-sm font-medium">AC Temperature</label>
                        <div class="grid grid-cols-4 gap-1">
                            <input name="ac1" id="ac1" value="{{$report->ac1}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac2" id="ac2" value="{{$report->ac2}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac3" id="ac3" value="{{$report->ac3}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac4" id="ac4" value="{{$report->ac4}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                    <div>
                        <label for="manpower" class="text-blue-950 block mb-1 text-sm font-medium">Manpower</label>
                        <div class="grid grid-cols-2 gap-1">
                        <input name="manpower_present" id="manpower_present" value="{{$report->manpower_present}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        <input name="manpower_absent" id="manpower_absent" value="{{$report->manpower_absent}}" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                </div>
                <!-- Summary Row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="sku" class="text-blue-950 block mb-1 text-xs font-medium">Running SKUs</label>
                        <input name="sku" id="sku" value="{{$report->sku}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="fbo_fco" class="text-blue-950 block mb-1 text-xs font-medium">FBO/FCO(H)</label>
                        <input  name="fbo_fco" id="fbo_fco" value="{{$report->fbo_fco}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="lbo_lco" class="text-blue-950 block mb-1 text-xs font-medium">LBO/LCO(H)</label>
                        <input  name="lbo_lco" id="lbo_lco" value="{{$report->lbo_lco}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="total_outputCase" class="text-blue-950 block mb-1 text-xs font-medium">Total Output Cases</label>
                        <input  name="total_outputCase" id="total_outputCase" value="{{$report->total_outputCase}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                </div>
            </div>

                <!-- STEP 2: Filling & Molding -->
            <div class="space-y-6">
            <div class="relative grid grid-cols-1 md:grid-cols-2 mt-7 gap-6">

                <!-- Filling Line -->
                <div class="space-y-4 pr-4">
                    <h2 class="font-bold text-lg text-blue-950">Filling Line</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div> 
                            <label for="fl_bottle_code" class="text-blue-950 block text-sm font-medium">Bottle Code</label>
                            <input name="fl_bottle_code" id="fl_bottle_code" value="{{$report->fl_bottle_code}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                        </div>
                        <div>
                            <label for="fl_filler_speed" class="text-blue-950 block text-sm font-bold">Speed (Bottle per hour)</label>
                            <label for="fl_filler_speed" class="text-blue-950 block text-xs font-medium">Filler Speed</label>
                            <input name="fl_filler_speed" id="fl_filler_speed" value="{{$report->fl_filler_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                        </div>
                        <div>
                            <label class="text-blue-950 block text-sm font-semibold mb-2">RM Rejects (Qty/Code)</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_opplabels" class="text-blue-950 text-xs w-1/2 text-right">Opp/Labels (pcs)</label>
                                    <input name="fl_opplabels" id="fl_opplabels" value="{{$report->fl_opplabels}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_shrinkfilm" class="text-blue-950 text-xs w-1/2 text-right">Shrinkfilm (pcs)</label>
                                    <input name="fl_shrinkfilm" id="fl_shrinkfilm" value="{{$report->fl_shrinkfilm}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-1 mt-1">
                            <div>
                                <label for="fl_labeler_speed" class="text-blue-950 block text-xs font-medium">Opp/Labeler Speed</label>
                                <input name="fl_labeler_speed" id="fl_labeler_speed" value="{{$report->fl_labeler_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div class="grid grid-cols-1 gap-1 mt-2">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_caps" class="text-blue-950 text-xs w-1/2 text-right">Caps (pcs)</label>
                                    <input name="fl_caps" id="fl_caps" value="{{$report->fl_caps}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_bottle_pcs" class="text-blue-950 text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input name="fl_bottle_pcs" id="fl_bottle_pcs" value="{{$report->fl_bottle_pcs}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_total_downtime" class="text-blue-950 text-xs w-1/2 text-right font-bold">Total Downtime</label>
                                    <input name="fl_total_downtime" id="fl_total_downtime" value="{{$report->fl_total_downtime}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blow Molding -->
                <div class="space-y-4 pl-4">
                <h2 class="font-bold text-lg text-blue-950">Blow Molding</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="bm_output" class="text-blue-950 block text-sm font-medium">Blow Molding Output</label>
                                <input name="bm_output" id="bm_output" value="{{$report->bm_output}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div>
                                <label for="bm_speed" class="text-blue-950 block text-sm font-medium">Speed (Bottles/hour)</label>
                                <input name="bm_speed" id="bm_speed" value="{{$report->bm_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                        </div>
                        <div>
                            <label class="text-blue-950 block text-sm font-bold">Blow Molding Rejects</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_preform" class="text-blue-950 text-xs w-1/2 text-right">Preform (pcs)</label>
                                    <input name="bm_preform" id="bm_preform" value="{{$report->bm_preform}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_bottle" class="text-blue-950 text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input name="bm_bottle" id="bm_bottle" value="{{$report->bm_bottle}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

             <!-- STEP 3: Issues -->
                <div class="space-y-4 mt-7">
                    <h2 class="font-bold text-lg text-blue-950">Issues / Downtime / Remarks</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="material" class="block mb-1 text-sm font-medium text-blue-950">Material</label>
                        <input name="materials[]" value="{{ $report->issues[0]->material ?? '' }}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="description" class="block mb-1 text-sm font-medium text-blue-950">Description</label>
                        <input name="description[]" value="{{ $report->issues[0]->description ?? '' }}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="minutes" class="block mb-1 text-sm font-medium text-blue-950">Minutes</label>
                        <input name="minutes[]" value="{{ $report->issues[0]->minutes ?? '' }}" class="text-center w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    </div>
                </div>

                <!-- STEP 4: QA / QC -->
                <div class="space-y-4 mt-7">

                <!-- QA -->
                <div class="space-y-4">
                <div class="grid grid-cols-1 gap-4">
                    <div class="grid md:grid-cols-12 gap-1 items-end">
                        <!-- QA Remarks -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg text-blue-950">QA Remarks</h2>
                            <label for="qa_ozone" class="text-xs w-1/2 text-right text-blue-950">Ozone</label>
                            <input name="qa_ozone" id="qa_ozone" value="{{$report->qa_ozone}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <!-- QA Sample -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg text-blue-950">QA Sample</h2>
                            {{-- <label class="block text-sm font-bold">QA Sample</label> --}}
                            <label for="qa_sampleSKU" class="text-xs w-1/2 text-right text-blue-950">SKU's</label>
                            <input name="qa_sampleSKU" id="qa_sampleSKU" value="{{$report->qa_sampleSKU}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_total" class="text-xs w-1/2 text-right text-blue-950">Total (in pcs)</label>
                            <input name="qa_total" id="qa_total" value="{{$report->qa_total}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wlabel" class="text-xs w-1/2 text-right text-blue-950">With label (in pcs)</label>
                            <input name="qa_wlabel" id="qa_wlabel" value="{{$report->qa_wlabel}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wolabel" class="text-xs w-1/2 text-right text-blue-950">Without label (in pcs)</label>
                            <input name="qa_wolabel" id="qa_wolabel" value="{{$report->qa_wolabel}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                    
                    <!-- Line QC Rejects -->
                    <h2 class="font-bold text-lg mt-6 text-blue-950">Line QC Rejects </h2>
                    <div class="grid md:grid-cols-10 gap-2 items-end">
                        <div class="md:col-span-2">
                            <label for="lr_sku" class="text-xs w-1/2 text-right text-blue-950">SKU's</label>
                            <input name="lr_sku" id="lr_sku" value="{{$report->lr_sku}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_noCaps" class="text-xs w-1/2 text-right text-blue-950">No caps</label>
                            <input name="lr_noCaps" id="lr_noCaps" value="{{$report->lr_noCaps}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_bandDamaged" class="text-xs w-1/2 text-right text-blue-950">Tampered band damaged</label>
                            <input name="lr_bandDamaged" id="lr_bandDamaged" value="{{$report->lr_bandDamaged}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lowFill" class="text-xs w-1/2 text-right text-blue-950">Low Fill</label>
                            <input name="lr_lowFill" id="lr_lowFill" value="{{$report->lr_lowFill}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_scbottle" class="text-xs w-1/2 text-right text-blue-950">Scratched on Bottle</label>
                            <input name="lr_scbottle" id="lr_scbottle" value="{{$report->lr_scbottle}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-10 gap-2 items-end">
                        <div class="md:col-span-2">
                            <label for="lr_bPinHole" class="text-xs w-1/2 text-right text-blue-950">Bottle with Pin Hole</label>
                            <input name="lr_bPinHole" id="lr_bPinHole"  value="{{$report->lr_bPinHole}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_visibleGlue" class="text-xs w-1/2 text-right text-blue-950">Visible Glue</label>
                            <input name="lr_visibleGlue" id="lr_visibleGlue"  value="{{$report->lr_visibleGlue}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_smBottle" class="text-xs w-1/2 text-right text-blue-950">Sticky/Messy Bottle</label>
                            <input name="lr_smBottle" id="lr_smBottle"  value="{{$report->lr_smBottle}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lRedTape"class="text-xs w-1/2 text-right text-blue-950">Label with Red Tape</label>
                            <input name="lr_lRedTape" id="lr_lRedTape"  value="{{$report->lr_lRedTape}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_dentedB"class="text-xs w-1/2 text-right text-blue-950">Dented Bottle</label>
                            <input name="lr_dentedB" id="lr_dentedB"  value="{{$report->lr_dentedB}}" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                </div>
                </div>
            </div>

@endsection
@extends('layouts.adminNavbar')

@section('content')
    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{url('admin/index')}}" class="inline-flex items-center text-sm font-medium text-blue-800 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Senior Production
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">Production Reports</a>
            </div>
        </li>
        <li>
          <div class="flex items-center">
              <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <a href="#" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">View Report</a>
          </div>
        </li>
    </ol>
    </nav>

    <div class="max-w-5xl mt-8 mx-auto py-5 px-5">

    <div class="flex flex-column mt-5 sm:flex-row flex-wrap space-y-4 justify-between sm:space-y-0 items-center pb-4">
        <!-- Status Section: Make it in the same line and bold 'Verified' -->
        <div class="flex items-center space-x-2">
            <h2 class="text-lg font-medium">Status:</h2>
            <span class="text-lg font-bold">{{$reports->status}}</span>
        </div>
        <!-- Export to PDF-->
        <div class="flex space-y-4 justify-end pb-4">
            <a href=""
                class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-white bg-[#242c67] hover:bg-[#1e2d57] shadow-md transition-all duration-300">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>pdf-document</title>
                        <g id="add" fill="currentColor" transform="translate(85.333333, 42.666667)">
                            <path d="M75.9466667,285.653333 C63.8764997,278.292415 49.6246897,275.351565 35.6266667,277.333333 L1.42108547e-14,277.333333 L1.42108547e-14,405.333333 L28.3733333,405.333333 L28.3733333,356.48 L40.5333333,356.48 C53.1304778,357.774244 65.7885986,354.68506 76.3733333,347.733333 C85.3576891,340.027178 90.3112817,328.626053 89.8133333,316.8 C90.4784904,304.790173 85.3164923,293.195531 75.9466667,285.653333 L75.9466667,285.653333 Z M53.12,332.373333 C47.7608867,334.732281 41.8687051,335.616108 36.0533333,334.933333 L27.7333333,334.933333 L27.7333333,298.666667 L36.0533333,298.666667 C42.094796,298.02451 48.1897668,299.213772 53.5466667,302.08 C58.5355805,305.554646 61.3626692,311.370371 61.0133333,317.44 C61.6596233,323.558965 58.5400493,329.460862 53.12,332.373333 L53.12,332.373333 Z M150.826667,277.333333 L115.413333,277.333333 L115.413333,405.333333 L149.333333,405.333333 C166.620091,407.02483 184.027709,403.691457 199.466667,395.733333 C216.454713,383.072462 225.530463,362.408923 223.36,341.333333 C224.631644,323.277677 218.198313,305.527884 205.653333,292.48 C190.157107,280.265923 170.395302,274.806436 150.826667,277.333333 L150.826667,277.333333 Z M178.986667,376.32 C170.098963,381.315719 159.922142,383.54422 149.76,382.72 L144.213333,382.72 L144.213333,299.946667 L149.333333,299.946667 C167.253333,299.946667 174.293333,301.653333 181.333333,308.053333 C189.877212,316.948755 194.28973,329.025119 193.493333,341.333333 C194.590843,354.653818 189.18793,367.684372 178.986667,376.32 L178.986667,376.32 Z M254.506667,405.333333 L283.306667,405.333333 L283.306667,351.786667 L341.333333,351.786667 L341.333333,329.173333 L283.306667,329.173333 L283.306667,299.946667 L341.333333,299.946667 L341.333333,277.333333 L254.506667,277.333333 L254.506667,405.333333 L254.506667,405.333333 Z M234.666667,7.10542736e-15 L9.52127266e-13,7.10542736e-15 L9.52127266e-13,234.666667 L42.6666667,234.666667 L42.6666667,192 L42.6666667,169.6 L42.6666667,42.6666667 L216.96,42.6666667 L298.666667,124.373333 L298.666667,169.6 L298.666667,192 L298.666667,234.666667 L341.333333,234.666667 L341.333333,106.666667 L234.666667,7.10542736e-15 L234.666667,7.10542736e-15 Z" id="document-pdf"> </path>
                        </g>
                    </g>
                </svg>
                <span class="text-sm">Export to PDF</span>
            </a>
        </div>

        </div>
        <!-- STEP 1: General Info -->
            <div class="space-y-6">
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
            <div class="space-y-6">
            <div class="relative grid grid-cols-1 md:grid-cols-2 mt-7 gap-6">

                <!-- Filling Line -->
                <div class="space-y-4 pr-4">
                    <h2 class="font-bold text-lg">Filling Line</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div> 
                            <label for="fl_bottle_code" class="block text-sm font-medium">Bottle Code</label>
                            <input disabled value="{{$reports->fl_bottle_code}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                        </div>
                        <div>
                            <label for="fl_filler_speed" class="block text-sm font-bold">Speed (Bottle per hour)</label>
                            <label for="fl_filler_speed" class="block text-xs font-medium">Filler Speed</label>
                            <input disabled value="{{$reports->fl_filler_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
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
                        <div class="grid grid-cols-2 gap-1 mt-1">
                            <div>
                                <label for="fl_labeler_speed" class="block text-xs font-medium">Opp/Labeler Speed</label>
                                <input disabled value="{{$reports->fl_labeler_speed}}" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div class="grid grid-cols-1 gap-1 mt-2">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_caps" class="text-xs w-1/2 text-right">Caps (pcs)</label>
                                    <input disabled value="{{$reports->fl_caps}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_bottle_pcs" class="text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input disabled value="{{$reports->fl_bottle_pcs}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_total_downtime" class="text-xs w-1/2 text-right font-bold">Total Downtime</label>
                                    <input disabled value="{{$reports->fl_total_downtime}}" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
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
                <div class="space-y-4 mt-7">
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
                <div class="space-y-4 mt-7">

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
                            <input name="lr_bPinHole" id="lr_bPinHole" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_visibleGlue" class="text-xs w-1/2 text-right">Visible Glue</label>
                            <input name="lr_visibleGlue" id="lr_visibleGlue" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_smBottle" class="text-xs w-1/2 text-right">Sticky/Messy Bottle</label>
                            <input name="lr_smBottle" id="lr_smBottle" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lRedTape"class="text-xs w-1/2 text-right">Label with Red Tape</label>
                            <input name="lr_lRedTape" id="lr_lRedTape" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_dentedB"class="text-xs w-1/2 text-right">Dented Bottle</label>
                            <input name="lr_dentedB" id="lr_dentedB" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Below the Inputs -->
            <div class="mt-10">
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
                            <td class="px-4 py-2 border-b border-[#0F1C39]">2025-05-13</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">#12345</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">Submitted</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">2025-05-13</td>
                            <td class="px-4 py-2">#67890</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]">Approved</td>
                            <td class="px-4 py-2 border-b border-[#0F1C39]"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
@endsection
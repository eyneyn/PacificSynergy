@extends('layouts.navbar')

@section('content')
    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{url('report/production_report')}}" class="inline-flex items-center text-sm font-medium text-blue-800 hover:text-blue-600">
              <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              Senior
          </a>
        </li>
        <li>
          <div class="flex items-center">
              <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <a href="{{url('report/production_report')}}" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">User Management</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
              <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <a href="{{ url('add_production')}}" class="disabled-link ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">Add Production Report</a>
          </div>
        </li>
    </ol>
    </nav>

     <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg px-8 py-10 mt-8 transition-all duration-300 hover:shadow-xl">
    
    @include('layouts._message')
    
    <form method="POST" action="productionreport_post" enctype="multipart/form-data" class="">
    @csrf

        <!-- Header Section -->
            <!-- Title and Subtext -->
            <div class="text-center md:col-span-3 mt-4">
                <h2 class="text-2xl font-semibold text-blue-950 mb-1">Production Report Form</h2>
                <p class="text-xs text-blue-950">Fill out the form below to submit daily production data.</p>
            </div>

            <div class="max-w-5xl mx-auto text-[#0F1C39]">

            <!-- Alpine.js -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            <div x-data="{ step: 1 }" class="max-w-6xl mx-auto px-4 py-8 text-[#0F1C39]">

            <!-- Step Navigation -->
            <ol class="flex items-center justify-between w-full mb-6">
                <template x-for="(label, index) in ['General Info', 'Filling & Molding', 'Issues', 'QA / QC', 'Submit']">
                <li class="flex-1 flex items-center">
                    <button
                    type="button"
                    @click="step = index + 1"
                    class="w-full text-sm text-center py-2 border-b-2"
                    :class="{
                        'border-[#0F1C39] font-bold': step === index + 1,
                        'border-gray-300 text-gray-500': step !== index + 1
                    }"
                    >
                    <span x-text="label"></span>
                    </button>
                </li>
                </template>
            </ol>

            <!-- STEP 1: General Info -->
            <div x-show="step === 1" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="production_date" class="block mb-1 text-sm font-medium">Production Date</label>
                        <input type="date" name="production_date" id="production_date" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent" />
                    </div>
                    <div>
                        <label for="line" class="block mb-1 text-sm font-medium">Line #</label>
                        <select name="line" id="line" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div>
                        <label for="shift" class="block mb-1 text-sm font-medium">Shift</label>
                        <select name="shift" id="shift" class="w-full border border-[#0F1C39] text-sm rounded-md p-2 bg-transparent">
                            <option>00:00H - 24:00H</option>
                        </select>
                    </div>
                    <div>
                        <label for="ac" class="block mb-1 text-sm font-medium">AC Temperature</label>
                        <div class="grid grid-cols-4 gap-1">
                            <input name="ac1" id="ac1" placeholder="AC 1" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac2" id="ac2" placeholder="AC 2" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac3" id="ac3" placeholder="AC 3" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                            <input name="ac4" id="ac4" placeholder="AC 4" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                    <div>
                        <label for="manpower" class="block mb-1 text-sm font-medium">Manpower</label>
                        <div class="grid grid-cols-2 gap-1">
                        <input name="manpower_present" id="manpower_present" placeholder="Present" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        <input name="manpower_absent" id="manpower_absent" placeholder="Absent" class="border p-1 text-center rounded-md border-[#0F1C39]" />
                        </div>
                    </div>
                </div>
                <!-- Summary Row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="sku" class="block mb-1 text-xs font-medium">Running SKUs</label>
                        <input name="sku" id="sku"  value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="fbo_fco" class="block mb-1 text-xs font-medium">FBO/FCO(H)</label>
                        <input name="fbo_fco" id="fbo_fco"  value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="lbo_lco" class="block mb-1 text-xs font-medium">LBO/LCO(H)</label>
                        <input name="lbo_lco" id="lbo_lco"  value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                    <div>
                        <label for="total_outputCase" class="block mb-1 text-xs font-medium">Total Output Cases</label>
                        <input name="total_outputCase" id="total_outputCase"  value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                    </div>
                </div>
            </div>

            <!-- STEP 2: Filling & Molding -->
            <div x-show="step === 2" class="space-y-6">
            <div class="relative grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Divider line in the center -->
                <div class="hidden md:block absolute top-0 bottom-0 left-1/2 w-px bg-[#0F1C39]"></div>

                <!-- Filling Line -->
                <div class="space-y-4 pr-4">
                    <h2 class="font-bold text-lg">Filling Line</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <div> 
                            <label for="fl_bottle_code" class="block text-sm font-medium">Bottle Code</label>
                            <input name="fl_bottle_code" id="fl_bottle_code" value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                        </div>
                        <div>
                            <label for="fl_filler_speed" class="block text-sm font-bold">Speed (Bottle per hour)</label>
                            <label for="fl_filler_speed" class="block text-xs font-medium">Filler Speed</label>
                            <input name="fl_filler_speed" id="fl_filler_speed"  value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">RM Rejects (Qty/Code)</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_opplabels" class="text-xs w-1/2 text-right">Opp/Labels (pcs)</label>
                                    <input name="fl_opplabels" id="fl_opplabels" alue="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_shrinkfilm" class="text-xs w-1/2 text-right">Shrinkfilm (pcs)</label>
                                    <input name="fl_shrinkfilm" id="fl_shrinkfilm" value="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-1 mt-1">
                            <div>
                                <label for="fl_labeler_speed" class="block text-xs font-medium">Opp/Labeler Speed</label>
                                <input name="fl_labeler_speed" id="fl_labeler_speed" value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div class="grid grid-cols-1 gap-1 mt-2">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_caps" class="text-xs w-1/2 text-right">Caps (pcs)</label>
                                    <input name="fl_caps" id="fl_caps" value="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_bottle_pcs" class="text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input name="fl_bottle_pcs" id="fl_bottle_pcs" value="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="fl_total_downtime" class="text-xs w-1/2 text-right font-bold">Total Downtime</label>
                                    <input name="fl_total_downtime" id="fl_total_downtime" placeholder="mins" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
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
                                <input name="bm_output" id="bm_output" value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                            <div>
                                <label for="bm_speed" class="block text-sm font-medium">Speed (Bottles/hour)</label>
                                <input name="bm_speed" id="bm_speed" value="0" class="w-full border border-[#0F1C39] text-center rounded-md p-1" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold">Blow Molding Rejects</label>
                            <div class="grid grid-cols-2 gap-1 mt-1">
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_preform" class="text-xs w-1/2 text-right">Preform (pcs)</label>
                                    <input name="bm_preform" id="bm_preform"  value="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <label for="bm_bottle" class="text-xs w-1/2 text-right">Bottle (pcs)</label>
                                    <input name="bm_bottle" id="bm_bottle"  value="0" class="w-1/2 border border-[#0F1C39] text-center rounded-md p-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
                <!-- STEP 3: Issues -->
                <div x-show="step === 3" class="space-y-4" x-data="{ issues: [{}] }">
                    <h2 class="font-bold text-lg">Issues / Downtime / Remarks</h2>

                    <template x-for="(issue, index) in issues" :key="index">
                        <div class="grid grid-cols-1 gap-3">
                            <div class="grid md:grid-cols-12 gap-2 items-end">
                                <!-- Materials -->
                                <div class="md:col-span-3">
                                    <input :name="'materials[]'" placeholder="Materials"
                                        class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                                </div>
                                <!-- Description -->
                                <div class="md:col-span-7">
                                    <input :name="'description[]'" placeholder="Description"
                                        class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                                </div>
                                <!-- Minutes -->
                                <div class="md:col-span-1">
                                    <input :name="'minutes[]'" placeholder="mins"
                                        class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                                </div>
                                <!-- Remove button (optional) -->
                                <div class="md:col-span-1">
                                    <button type="button" @click="issues.splice(index, 1)"
                                        class="bg-red-600 text-white px-4 py-2 text-sm rounded-md"
                                        x-show="issues.length > 1">Remove</button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Add Button -->
                    <div>
                        <input type="hidden" name="status" id="status" value="Submitted">
                        <button type="button" @click="issues.push({})"
                            class="bg-green-600 text-white px-4 py-2 text-sm rounded-md">
                            Add Issue Row
                        </button>
                    </div>
                </div>


                    
              <!-- STEP 4: QA / QC -->
            <div x-show="step === 4" class="space-y-4">

                <!-- QA -->
                <div class="space-y-4">
                <div class="grid grid-cols-1 gap-3">
                    <div class="grid md:grid-cols-12 gap-1 items-end">
                        <!-- QA Remarks -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg">QA Remarks</h2>
                            <label for="qa_ozone" class="text-xs w-1/2 text-right">Ozone</label>
                            <input name="qa_ozone" id="qa_ozone" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <!-- QA Sample -->
                        <div class="md:col-span-3">
                            <h2 class="font-bold text-lg">QA Sample</h2>
                            {{-- <label class="block text-sm font-bold">QA Sample</label> --}}
                            <label for="qa_sampleSKU" class="text-xs w-1/2 text-right">SKU's</label>
                            <input name="qa_sampleSKU" id="qa_sampleSKU" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_total" class="text-xs w-1/2 text-right">Total (in pcs)</label>
                            <input name="qa_total" id="qa_total" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wlabel" class="text-xs w-1/2 text-right">With label (in pcs)</label>
                            <input name="qa_wlabel" id="qa_wlabel" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="qa_wolabel" class="text-xs w-1/2 text-right">Without label (in pcs)</label>
                            <input name="qa_wolabel" id="qa_wolabel" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                    </div>
                    
                    <!-- Line QC Rejects -->
                    <h2 class="font-bold text-lg mt-6">Line QC Rejects </h2>
                    <div class="grid md:grid-cols-10 gap-2 items-end">
                        <div class="md:col-span-2">
                            <label for="lr_sku" class="text-xs w-1/2 text-right">SKU's</label>
                            <input name="lr_sku" id="lr_sku" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_noCaps" class="text-xs w-1/2 text-right">No caps</label>
                            <input name="lr_noCaps" id="lr_noCaps" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_bandDamaged" class="text-xs w-1/2 text-right">Tampered band damaged</label>
                            <input name="lr_bandDamaged" id="lr_bandDamaged" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_lowFill" class="text-xs w-1/2 text-right">Low Fill</label>
                            <input name="lr_lowFill" id="lr_lowFill" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="lr_scbottle" class="text-xs w-1/2 text-right">Scratched on Bottle</label>
                            <input name="lr_scbottle" id="lr_scbottle" placeholder="0" class="w-full border border-[#0F1C39] text-sm text-center rounded-md p-2" />
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

             <!-- STEP 5: Submit -->
            <div x-show="step === 5" class="text-center py-6 space-y-4">
                <h2 class="text-xl font-bold">Ready to Submit?</h2>
                <p class="text-sm">Review your data and click the button below to finish.</p>
                <div class="flex justify-center gap-4">
                <button type="button" class="px-6 py-2 bg-gray-200 text-[#0F1C39] rounded-md cursor-pointer" @click="step = 1">Back</button>
                <button type="submit" class="px-6 py-2 bg-green-700 text-white rounded-md cursor-pointer">Submit</button>
                </div>
            </div>
            </div>
        </div>

    <script src="" defer></script>
@endsection
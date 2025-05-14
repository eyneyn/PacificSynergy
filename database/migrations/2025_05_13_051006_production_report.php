<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_reports', function (Blueprint $table) {
            $table->id();
            $table->date('production_date');
            $table->integer('line');
            $table->string('shift');
            $table->integer('ac1')->nullable();
            $table->integer('ac2')->nullable();
            $table->integer('ac3')->nullable();
            $table->integer('ac4')->nullable();
            $table->integer('manpower_present')->nullable();
            $table->integer('manpower_absent')->nullable();
            $table->string('sku')->nullable();
            $table->string('fbo_fco')->nullable();
            $table->string('lbo_lco')->nullable();
            $table->integer('total_outputCase')->nullable();

            //Filling line
            $table->string('fl_bottle_code')->nullable();
            $table->integer('fl_filler_speed')->nullable();
            $table->integer('fl_opplabels')->nullable();
            $table->integer('fl_shrinkfilm')->nullable();
            $table->integer('fl_labeler_speed')->nullable();
            $table->integer('fl_caps')->nullable();
            $table->integer('fl_bottle_pcs')->nullable();
            $table->integer('fl_total_downtime')->nullable();

            // Blow Molding
            $table->integer('bm_output')->nullable();
            $table->integer('bm_speed')->nullable();
            $table->integer('bm_preform')->nullable();
            $table->integer('bm_bottle')->nullable();

            // QA and Line Rejects
            $table->text('qa_ozone')->nullable();
            $table->string('qa_sampleSKU')->nullable();
            $table->integer('qa_total')->nullable();
            $table->integer('qa_wlabel')->nullable();
            $table->integer('qa_wolabel')->nullable();

            $table->string('lr_sku')->nullable();
            $table->integer('lr_noCaps')->nullable();
            $table->integer('lr_bandDamaged')->nullable();
            $table->integer('lr_lowFill')->nullable();
            $table->integer('lr_scbottle')->nullable();
            $table->integer('lr_bPinHole')->nullable();
            $table->integer('lr_visibleGlue')->nullable();
            $table->integer('lr_smBottle')->nullable();
            $table->integer('lr_lRedTape')->nullable();
            $table->integer('lr_dentedB')->nullable();

            $table->string('status')->nullable();

            //User created
            $table->unsignedBigInteger('created_by_id')->nullable();

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_reports');
    }
};

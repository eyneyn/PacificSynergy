<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductionIssue;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class ProductionReport extends Model
{
    //
    protected $fillable = [
        'production_date',
        'line',
        'shift',
        'ac1',
        'ac2',
        'ac3',
        'ac4',
        'manpower_present',
        'manpower_absent',
        'sku',
        'fbo_fco',
        'lbo_lco',
        'total_outputCase',
        
        // Filling Line
        'fl_bottle_code',
        'fl_filler_speed',
        'fl_opplabels',
        'fl_shrinkfilm',
        'fl_labeler_speed',
        'fl_caps',
        'fl_bottle_pcs',
        'fl_total_downtime',

        // Blow Molding
        'bm_output',
        'bm_speed',
        'bm_preform',
        'bm_bottle',

        //QA and Line Rejects
        'qa_ozone',
        'qa_sampleSKU',
        'qa_total',
        'qa_wlabel',
        'qa_wolabel',

        'lr_sku',
        'lr_noCaps',
        'lr_bandDamaged',
        'lr_lowFill',
        'lr_scbottle',
        'lr_bPinHole',
        'lr_visibleGlue',
        'lr_smBottle',
        'lr_lRedTape',
        'lr_dentedB',

        'status'
    ];
    //Issues logs
    public function issues()
    {
        return $this->hasMany(ProductionIssue::class, 'production_report_id');
    }
    protected static function booted()
    {
        static::creating(function ($report) {
            $report->user_id = Auth::id();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function updates()
    {
        return $this->hasMany(ProductionReportUpdate::class);
    }
    public $timestamps = true;
    const UPDATED_AT = null; // ← disables updated_at
}

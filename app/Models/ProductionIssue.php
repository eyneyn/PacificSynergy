<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductionReport;

class ProductionIssue extends Model
{
    //
    protected $fillable = [
        'production_report_id', 
        'material', 
        'description', 
        'minutes'
    ];
    public function report()
    {
        return $this->belongsTo(ProductionReport::class, 'production_report_id');
    }

}

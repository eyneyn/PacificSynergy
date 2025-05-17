<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionReportUpdate extends Model
{
    protected $fillable = [
        'production_report_id',
        'user_id',
        'status',
        'remarks',
    ];

    public function report()
    {
        return $this->belongsTo(ProductionReport::class, 'production_report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = true;
    const CREATED_AT = null;
}

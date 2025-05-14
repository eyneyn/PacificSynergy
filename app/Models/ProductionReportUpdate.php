<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionReportUpdate extends Model
{
    protected $fillable = [
        'production_report_id',
        'user_id',
        'user_name',
        'changed_fields',
        'remarks',
    ];

    protected $casts = [
        'changed_fields' => 'array',
    ];

    public function report()
    {
        return $this->belongsTo(ProductionReport::class, 'production_report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

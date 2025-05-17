<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\ProductionReport;

class SidebarComposer
{
    public function compose(View $view): void
    {
        $submittedCount = ProductionReport::where('status', 'Submitted')->count();

        $view->with('submittedCount', $submittedCount);
    }
}
<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarFooter extends Component
{
    public function render(): View
    {
        return view('components.sidebar-footer');
    }
}

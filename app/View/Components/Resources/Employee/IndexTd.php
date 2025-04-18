<?php

namespace App\View\Components\Resources\Employee;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IndexTd extends Component
{
    public $data2;
    public function __construct($data=[])
    {
        $this->data2 = $data;
    }

    public function render(): View|Closure|string
    {
        return view('components.resources.customer.index-td');
    }
}

<?php

namespace App\View\Components\Text;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class H6 extends Component
{
    public $style;
    public function __construct($style='primary ')
    {
        $this->style = $style;
    }
    
    public function render(): View|Closure|string
    {
        return view(Session::get('user')['theme'].'.text.h6');
    }
}

<?php

namespace App\View\Components\Card\Type;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class Standard extends Component
{
    public $action;
    public $target;
    public $style;
    public $class;
    public function __construct( $action="#", $target="_self", $style='primary ', $class='')
    {
        $this->style = $style;
        $this->action = $action;
        $this->target = $target;
        $this->class = $class;
    }
    
    public function render(): View|Closure|string
    {
        return view(Session::get('user')['theme'].'.card.type.primary');
    }
}

<?php

namespace App\View\Components\Ui\Button;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class Small extends Component
{
    public $type;
    public $style;
    public $title;
    
    public function __construct($style = 'primary', $type = 'button', $title = '')
    {
        $this->type = $type;
        $this->style = $style;
        $this->title = $title;
    }
    
    public function render(): View|Closure|string
    {
        return view(Session::get('user')['theme'].'.ui.button.small');
    }
}

<?php

namespace App\View\Components\Ui\Card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $type;
    public $header;
    public $footer;
    public function __construct($type = 'primary', $header = null, $footer=null)
    {
        $this->type = $type;
        $this->header = $header;
        $this->footer = $footer;
    }


    public function render(): View|Closure|string
    {
        return view('components.ui.card.card');
    }
}

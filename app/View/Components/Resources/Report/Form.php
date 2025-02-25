<?php

namespace App\View\Components\Resources\Report;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $title;
    public $action;
    public $method;
    public $submitName;
    public $to_date;
    public $from_date;
    public function __construct($title, $action="#", $method="post", $submitName="Download")
    {
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
        $this->submitName = $submitName;
        $this->to_date = date_format(date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string('0 days')), 'Y-m-d');
        $this->from_date = date_format(date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string('-30 days')), 'Y-m-d');
    }

    public function render(): View|Closure|string
    {
        return view('components.resources.report.form');
    }
}

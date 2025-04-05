<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmployeeForm extends Component
{
    public $employee;
    /**
     * Create a new component instance.
     */
    public function __construct($employee = NULL)
    {
        $this->employee = $employee;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.employee-form');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusInput extends Component
{
    /**
     * Create a new component instance.
     */

    public $label;
    public $selected;
    public $name;

    public function __construct($label = null, $selected = null, $name = null)
    {
        $this->label = $label;
        $this->selected = $selected;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-input');
    }
}

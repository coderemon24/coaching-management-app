<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */

    public $type;
    public $name;
    public $value;
    public $label;
    public $id;
    public $placeholder;
    public $required;
    public $param;
    public $class;

    public function __construct(
        $type = 'text',
        $name = '',
        $value = '',
        $label = '',
        $id = '',
        $class = '',
        $placeholder = '',
        $required = '*',
        $param = '',
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->param = $param;
        $this->class = $class;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}

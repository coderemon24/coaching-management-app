<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MailTemplatePreview extends Component
{
    /**
     * Create a new component instance.
     */


    public $template;
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mail-template-preview');
    }
}

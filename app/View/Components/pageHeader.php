<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pageHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct
    (public string $backRoute,
     public string $title,
     public string $actionLabel = 'Save',
     public ?string $actionUrl = null,
     public bool $submit = false,
     public ?string $cancelLabel = 'Cancel',
     public bool $deleteLabel = false


    )
    {
     
        
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-header');
    }
}

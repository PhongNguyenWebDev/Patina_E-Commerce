<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerticalNavLink extends Component
{
    public $href;
    public $active;
    public $slugBrand;
    public function __construct($href, $active = false, $slugBrand = false)
    {
        $this->href = $href;
        $this->active = $active;
        $this->slugBrand = $slugBrand;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vertical-nav-link');
    }
}

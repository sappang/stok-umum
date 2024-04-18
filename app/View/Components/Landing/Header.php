<?php

namespace App\View\Components\Landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $title, $subtitle, $url;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $subtitle, $url)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.header');
    }
}

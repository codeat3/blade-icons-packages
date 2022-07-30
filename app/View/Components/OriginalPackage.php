<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OriginalPackage extends Component
{
    public $package;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($package)
    {
        $this->package = $package;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('components.original-package');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Package extends Component
{
    public $package;
    public function __construct($package)
    {
        $this->package = $package;
    }

    public function render()
    {
        return view('components.package');
    }
}

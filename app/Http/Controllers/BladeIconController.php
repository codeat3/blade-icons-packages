<?php

namespace App\Http\Controllers;

use App\Models\BladeIcon;
use Illuminate\Http\Request;

class BladeIconController extends Controller
{
    public function __invoke()
    {
        $packages = BladeIcon::all();

        return view('list', [
            'packages' => $packages,
        ]);
    }
}

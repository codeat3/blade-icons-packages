<?php

namespace App\Http\Controllers;

use App\Models\BladeIcon;
use Illuminate\Http\Request;

class BladeIconController extends Controller
{
    public function __invoke()
    {
        return view('list', [
            'packages' => BladeIcon::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\BladeIconResource;
use App\Models\BladeIcon;
use Illuminate\Support\Str;

class BladeIconApiController extends Controller
{
    public function __invoke()
    {
        return BladeIconResource::collection(
            BladeIcon::get()->filter(
                fn ($row) => Str::contains($row->package, 'codeat3')
            )
        )->sortByDesc('downloads');
    }
}

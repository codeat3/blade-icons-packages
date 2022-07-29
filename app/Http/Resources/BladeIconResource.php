<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * App\Http\Resources\BladeIconResource
 *
 * @property string $package
 * @property string $name
 * @property string $package_url
 * @property mixed $original_package
 * @property string $nam
 * @property string $latest_version
 * @property int $downloads
 * @property int $stars
 */
class BladeIconResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'package' => $this->package,
            'package_url' => $this->package_url,
            'original_package' => $this->original_package,
            'name' => $this->name,
            'latest_version' => $this->latest_version,
            'downloads' => $this->downloads,
            'stars' => $this->stars,
        ];
    }
}

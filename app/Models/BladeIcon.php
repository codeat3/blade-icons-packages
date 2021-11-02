<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BladeIcon extends Model
{
    use \Sushi\Sushi;

    private const YAML_FILE_PATH = 'vendor/codeat3/blade-icons-packages-collection/collections.yml';

    protected $casts = [
        'maintainers' => 'array',
        'original_package' => 'array',
        'listed_on_blade_icon_readme' => 'boolean',
    ];

    protected $yamlData;

    public function getMaintainerAttribute()
    {
        return Arr::first($this->maintainers);
    }

    public function getMaintainerNameAttribute()
    {
        return Arr::get($this->maintainer, 'name');
    }

    public function getMaintainerAvatarAttribute()
    {
        return Arr::get($this->maintainer, 'avatar_url');
    }

    public function getPackageUrlAttribute()
    {
        return 'https://github.com/'.$this->package;
    }

    private function getYamlData()
    {
        if (empty($this->yamlData)) {
            $collectionPath = base_path() . '/' . self::YAML_FILE_PATH;
            $this->yamlData = (new Yaml())->parse(file_get_contents($collectionPath));
        }

        return $this->yamlData;
    }

    public function getUpdatedAtTime()
    {
        return Carbon::parse(Arr::get($this->getYamlData(), 'updated_at'));
    }

    public function getRows()
    {
        $yamlData = $this->getYamlData();
        $packages = collect(Arr::get($yamlData, 'packages', []))
            ->map(function ($values) {
                $values['maintainers'] = json_encode(Arr::get($values, 'maintainers'));
                $values['original_package'] = json_encode(Arr::get($values, 'original_package'));
                return $values;
            })->toArray();
        return $packages;
    }
}

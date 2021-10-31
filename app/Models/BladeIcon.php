<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Eloquent\Model;

class BladeIcon extends Model
{
    use \Sushi\Sushi;

    private const YAML_FILE_PATH = 'vendor/codeat3/blade-icons-packages-collection/collections.yml';

    protected $casts = [
        'maintainers' => 'array',
        'original_package' => 'array',
        'listed_on_blade_icon_readme' => 'boolean',
    ];

    public function getRows()
    {
        $collectionPath = base_path() . '/' . self::YAML_FILE_PATH;
        $yamlData = (new Yaml())->parse(file_get_contents($collectionPath));
        $packages = collect(Arr::get($yamlData, 'packages', []))
            ->map(function ($values) {
                $values['maintainers'] = json_encode(Arr::get($values, 'maintainers'));
                $values['original_package'] = json_encode(Arr::get($values, 'original_package'));
                return $values;
            })->toArray();
        return $packages;
    }
}

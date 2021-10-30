<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Eloquent\Model;

class BladeIcon extends Model
{
    use \Sushi\Sushi;

    private const YAML_FILE_PATH = 'vendor/codeat3/blade-icons-packages-collection/collections.yml';

    public function getRows()
    {
        $collectionPath = base_path() . '/' . self::YAML_FILE_PATH;
        $yamlData = (new Yaml())->parse(file_get_contents($collectionPath));
        $packages = collect(Arr::get($yamlData, 'packages', []))
            ->map(function ($values) {
                $values['author_name'] = Arr::get($values, 'author.name');
                $values['author_avatar'] = Arr::get($values, 'author.avatar_url');
                unset($values['author']);
                return $values;
            })->toArray();
        return $packages;
    }
}

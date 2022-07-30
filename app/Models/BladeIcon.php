<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

/**
 * App\Models\BladeIcon
 *
 * @property array $maintainers
 * @property string $maintainer
 * @property string $package
 * @property array $versions
 */
class BladeIcon extends Model
{
    use \Sushi\Sushi;

    private const YAML_FILE_PATH = 'vendor/codeat3/blade-icons-packages-collection/collections.yml';

    protected $casts = [
        'maintainers' => 'array',
        'versions' => 'array',
        'original_package' => 'array',
        'listed_on_blade_icon_readme' => 'boolean',
    ];

    protected $yamlData;

    public function getMaintainerAttribute(): string
    {
        return Arr::first($this->maintainers);
    }

    public function getMaintainerNameAttribute(): string
    {
        return Arr::get($this->maintainer, 'name');
    }

    public function getMaintainerAvatarAttribute(): string
    {
        return Arr::get($this->maintainer, 'avatar_url');
    }

    public function getPackageUrlAttribute(): string
    {
        return 'https://github.com/' . $this->package;
    }

    public function getPackagistStatsUrlAttribute(): string
    {
        return 'https://packagist.org/packages/' . $this->package . '/stats';
    }

    public function getLatestVersionAttribute()
    {
        $versions = collect($this->versions)
            ->filter(fn ($v) => ! Str::contains($v, 'dev'))
            ->toArray();

        if (count($versions) === 0) {
            $versions = collect($this->versions)
                ->toArray();
        }

        usort($versions, 'version_compare');

        return Arr::last($versions);
    }

    private function getYamlData()
    {
        if (empty($this->yamlData)) {
            $collectionPath = base_path() . '/' . self::YAML_FILE_PATH;
            $this->yamlData = (new Yaml())->parse(file_get_contents($collectionPath));
        }

        return $this->yamlData;
    }

    public function getUpdatedAtTime(): Carbon
    {
        return Carbon::parse(Arr::get($this->getYamlData(), 'updated_at'));
    }

    public function getRows(): array
    {
        return collect(Arr::get($this->getYamlData(), 'packages', []))
            ->map(function ($values) {
                $values['maintainers'] = json_encode(Arr::get($values, 'maintainers'));
                $values['versions'] = json_encode(Arr::get($values, 'versions'));
                $values['original_package'] = json_encode(Arr::get($values, 'original_package'));

                return $values;
            })->toArray();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\BladeIcon;
use Livewire\Component;

class ShowPackages extends Component
{
    public $search;

    public $sortBy = 'downloads';

    public $sortOrder = 'desc';

    public $graphType = 'downloads';

    public $listedOnReadme;

    protected $queryString = ['search', 'sort_by', 'sort_order', 'listed_on_readme'];

    protected $rules = [
        'search' => ['nullable', 'string'],
        'sort_by' => ['nullable', 'in:name,downloads,stars'],
        'sort_order' => ['nullable', 'in:asc,desc'],
        'listed_on_readme' => ['nullable', 'in:all,yes,no'],
    ];

    public function rules()
    {
        return $this->rules;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $this->validate();

        $packages = BladeIcon::query()
            ->when(
                $this->search,
                fn ($builder) => $builder->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('package', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('maintainers', 'LIKE', '%' . $this->search . '%')
            )
            ->when(
                $this->listedOnReadme,
                function ($builder, $listedOnReadme) {
                    if ($listedOnReadme === 'yes') {
                        $builder->where('listed_on_blade_icon_readme', '=', true);
                    }
                    if ($listedOnReadme === 'no') {
                        $builder->where('listed_on_blade_icon_readme', '=', false);
                    }
                }
            )
            ->when(
                $this->sortBy && $this->sortOrder,
                fn ($builder) => $builder->orderBy($this->sortBy, $this->sortOrder),
                fn ($builder) => $builder->orderBy('name', 'ASC')
            )
            ->get();

        return view('livewire.show-packages', [
            'updated_at' => (new BladeIcon())->getUpdatedAtTime(),
            'total_packages' => BladeIcon::count(),
            'packages' => $packages,
        ]);
    }
}

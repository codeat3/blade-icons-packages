<?php

namespace App\Http\Livewire;

use App\Models\BladeIcon;
use Livewire\Component;

class ShowPackages extends Component
{
    public $search;
    public $sort_by = 'downloads';
    public $sort_order = 'desc';
    public $listed_on_readme;

    protected $queryString = ['search', 'sort_by', 'sort_order', 'listed_on_readme'];

    protected $rules = [
        'search' => ['nullable', 'string'],
        'sort_by' => ['nullable', 'in:name,downloads,stars'],
        'sort_order' => ['nullable', 'in:asc,desc'],
        'listed_on_readme' => ['nullable', 'boolean'],
    ];

    public function render()
    {
        $this->validate();
        return view('livewire.show-packages', [
            'packages' => BladeIcon::query()
                ->when(
                    $this->search,
                    fn ($builder) => $builder->where('name', 'LIKE', '%' . $this->search . '%')
                                        ->orWhere('package', 'LIKE', '%' . $this->search . '%')
                                        ->orWhere('maintainers', 'LIKE', '%' . $this->search . '%')
                )
                ->when(
                    $this->listed_on_readme,
                    fn ($builder) => $builder->where('listed_on_blade_icon_readme', '=', true)
                )
                ->when(
                    $this->sort_by && $this->sort_order,
                    fn ($builder) => $builder->orderBy($this->sort_by, $this->sort_order),
                    fn ($builder) => $builder->orderBy('name', 'ASC')
                )
                ->get(),
        ]);
    }
}

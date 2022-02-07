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
        'listed_on_readme' => ['nullable', 'in:all,yes,no'],
    ];

    public function rules()
    {
        return $this->rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function render()
    {
        $this->validate();

        return view('livewire.show-packages', [
            'updated_at' => (new BladeIcon())->getUpdatedAtTime(),
            'total_packages' => BladeIcon::count(),
            'packages' => BladeIcon::query()
                ->when(
                    $this->search,
                    fn ($builder) => $builder->where('name', 'LIKE', '%'.$this->search.'%')
                                        ->orWhere('package', 'LIKE', '%'.$this->search.'%')
                                        ->orWhere('maintainers', 'LIKE', '%'.$this->search.'%')
                )
                ->when(
                    $this->listed_on_readme,
                    function ($builder, $listed_on_readme) {
                        if ($listed_on_readme === 'yes') {
                            $builder->where('listed_on_blade_icon_readme', '=', true);
                        }
                        if ($listed_on_readme === 'no') {
                            $builder->where('listed_on_blade_icon_readme', '=', false);
                        }
                    }
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

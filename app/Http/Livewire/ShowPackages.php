<?php

namespace App\Http\Livewire;

use App\Models\BladeIcon;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Str;
use Livewire\Component;

class ShowPackages extends Component
{
    public $search;

    public $sort_by = 'downloads';

    public $sort_order = 'desc';

    public $graph_type = 'downloads';

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
            ->get();

        $pieChartModel = BladeIcon::query()
            ->get()
            ->map(function ($item) {
                $item->org = Str::before($item->package, '/');
                $item->count = 1;

                return $item;
            })
            ->groupBy('org')
            ->sortByDesc(function ($orgs, $key) {
                return $orgs->sum($this->graph_type);
            })
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = $data->first()->org;
                    $value = $data->sum($this->graph_type);

                    return $pieChartModel->addSlice($type, $value, '#4F46E5');
                },
                LivewireCharts::pieChartModel()
                    ->setTitle(Str::title($this->graph_type) . ' by org')
                    ->setAnimated(true)
                    ->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled(true)
                    ->setColors(['#9F1239', '#86198F', '#5B21B6', '#1E40AF', '#155E75'])
            );

        return view('livewire.show-packages', [
            'pieChartModel' => $pieChartModel,
            'updated_at' => (new BladeIcon())->getUpdatedAtTime(),
            'total_packages' => BladeIcon::count(),
            'packages' => $packages,
        ]);
    }
}

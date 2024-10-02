<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use App\Models\Guide;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TourGuidesDetail extends Component
{
    use AuthorizesRequests;

    public Tour $tour;
    public Guide $guide;
    public $guidesForSelect = [];
    public $guide_id = null;

    public $showingModal = false;
    public $modalTitle = 'New Guide';

    protected $rules = [
        'guide_id' => ['required', 'exists:guides,id'],
    ];

    public function mount(Tour $tour): void
    {
        $this->tour = $tour;
        $this->guidesForSelect = Guide::pluck('guid_first_name', 'id');
        $this->resetGuideData();
    }

    public function resetGuideData(): void
    {
        $this->guide = new Guide();

        $this->guide_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newGuide(): void
    {
        $this->modalTitle = trans('crud.tour_guides.new_title');
        $this->resetGuideData();

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        $this->authorize('create', Guide::class);

        $this->tour->guides()->attach($this->guide_id, []);

        $this->hideModal();
    }

    public function detach($guide): void
    {
        $this->authorize('delete-any', Guide::class);

        $this->tour->guides()->detach($guide);

        $this->resetGuideData();
    }

    public function render(): View
    {
        return view('livewire.tour-guides-detail', [
            'tourGuides' => $this->tour
                ->guides()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}

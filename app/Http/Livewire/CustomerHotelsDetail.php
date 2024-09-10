<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerHotelsDetail extends Component
{
    use AuthorizesRequests;

    public Customer $customer;
    public Hotel $hotel;
    public $hotelsForSelect = [];
    public $hotel_id = null;

    public $showingModal = false;
    public $modalTitle = 'New Hotel';

    protected $rules = [
        'hotel_id' => ['required', 'exists:hotels,id'],
    ];

    public function mount(Customer $customer): void
    {
        $this->customer = $customer;
        $this->hotelsForSelect = Hotel::pluck('hotel_name', 'id');
        $this->resetHotelData();
    }

    public function resetHotelData(): void
    {
        $this->hotel = new Hotel();

        $this->hotel_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newHotel(): void
    {
        $this->modalTitle = trans('crud.customer_hotels.new_title');
        $this->resetHotelData();

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

        $this->authorize('create', Hotel::class);

        $this->customer->hotels()->attach($this->hotel_id, []);

        $this->hideModal();
    }

    public function detach($hotel): void
    {
        $this->authorize('delete-any', Hotel::class);

        $this->customer->hotels()->detach($hotel);

        $this->resetHotelData();
    }

    public function render(): View
    {
        return view('livewire.customer-hotels-detail', [
            'customerHotels' => $this->customer
                ->hotels()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}

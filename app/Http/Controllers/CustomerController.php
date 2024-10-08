<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Tour;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Customer::class);

        $search = $request->get('search', '');

        $customers = Customer::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.customers.index', compact('customers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Customer::class);
        $hotels = Hotel::all();
        $tours = Tour::all();
        return view('app.customers.create', compact('hotels','tours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {

        $this->authorize('create', Customer::class);
        $validated = $request->validated();
        $validated['unique_id'] = Str::random(9);

        $customer = Customer::create($validated);
        $hotels = $request->hotels;
        $customer->hotels()->attach($hotels);

        return redirect()
            ->route('customers.edit', $customer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Customer $customer): View
    {
        $this->authorize('view', $customer);
        $customer_hotel=DB::table('customer_hotel')
            ->join('hotels', 'hotels.id', '=', 'customer_hotel.hotel_id')
            ->join('customers', 'customers.id', '=', 'customer_hotel.customer_id')
            ->where('customer_id',$customer->id)
            ->get();
        return view('app.customers.show', compact('customer','customer_hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Customer $customer): View
    {
        $this->authorize('update', $customer);
        $hotels = Hotel::all();
        $tours = Tour::all();
        return view('app.customers.edit', compact('customer','hotels','tours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CustomerUpdateRequest $request,
        Customer $customer
    ): RedirectResponse {
        $this->authorize('update', $customer);

        $validated = $request->validated();

        $customer->update($validated);

        return redirect()
            ->route('customers.edit', $customer)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Customer $customer
    ): RedirectResponse {
        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

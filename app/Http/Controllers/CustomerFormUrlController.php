<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CustomerFormUrl;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerFormUrlStoreRequest;
use App\Http\Requests\CustomerFormUrlUpdateRequest;

class CustomerFormUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', CustomerFormUrl::class);

        $search = $request->get('search', '');

        $customerFormUrls = CustomerFormUrl::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.customer_form_urls.index',
            compact('customerFormUrls', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', CustomerFormUrl::class);

        $customers = Customer::pluck('customer_name', 'id');
        $tours = Tour::pluck('unique_id', 'id');

        return view(
            'app.customer_form_urls.create',
            compact('customers', 'tours')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CustomerFormUrlStoreRequest $request
    ) {
        $this->authorize('create', CustomerFormUrl::class);
        $todayDate = now()->format('Y-m-d');
        $customer = Customer::find($request->customer_id);
        $unique_id = str()->random();
        $baseUrl = url('/');
        $url = $baseUrl . '/user/' . $unique_id . '/link/' . $customer->customer_name;
        $tour_id = Tour::where('tour_no',$customer->tour_no)->first();
        $validated = $request->validated();
        $validated['unique_id'] = $unique_id;
        $validated['url_link'] = $url;
        $validated['tour_id'] = $tour_id->id;
        $validated['status'] = 'In Progress';
        $validated['date'] = $todayDate;
        CustomerFormUrl::create($validated);
        return redirect()
            ->route('customer-form-urls.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        CustomerFormUrl $customerFormUrl
    ): View {
        $this->authorize('view', $customerFormUrl);

        return view('app.customer_form_urls.show', compact('customerFormUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        CustomerFormUrl $customerFormUrl
    ): View {
        $this->authorize('update', $customerFormUrl);

        $customers = Customer::pluck('customer_name', 'id');
        $tours = Tour::pluck('unique_id', 'id');

        return view(
            'app.customer_form_urls.edit',
            compact('customerFormUrl', 'customers', 'tours')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CustomerFormUrlUpdateRequest $request,
        CustomerFormUrl $customerFormUrl
    ): RedirectResponse {
        $this->authorize('update', $customerFormUrl);

        $validated = $request->validated();

        $customerFormUrl->update($validated);

        return redirect()
            ->route('customer-form-urls.edit', $customerFormUrl)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        CustomerFormUrl $customerFormUrl
    ): RedirectResponse {
        $this->authorize('delete', $customerFormUrl);

        $customerFormUrl->delete();

        return redirect()
            ->route('customer-form-urls.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

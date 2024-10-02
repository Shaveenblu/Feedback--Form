<?php
namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;

class HotelCustomersController extends Controller
{
    public function index(Request $request, Hotel $hotel): CustomerCollection
    {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $customers = $hotel
            ->customers()
            ->search($search)
            ->latest()
            ->paginate();

        return new CustomerCollection($customers);
    }

    public function store(
        Request $request,
        Hotel $hotel,
        Customer $customer
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->customers()->syncWithoutDetaching([$customer->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Hotel $hotel,
        Customer $customer
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->customers()->detach($customer);

        return response()->noContent();
    }
}

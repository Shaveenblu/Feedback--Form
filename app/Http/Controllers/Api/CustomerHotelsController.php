<?php
namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelCollection;

class CustomerHotelsController extends Controller
{
    public function index(Request $request, Customer $customer): HotelCollection
    {
        $this->authorize('view', $customer);

        $search = $request->get('search', '');

        $hotels = $customer
            ->hotels()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelCollection($hotels);
    }

    public function store(
        Request $request,
        Customer $customer,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $customer);

        $customer->hotels()->syncWithoutDetaching([$hotel->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Customer $customer,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $customer);

        $customer->hotels()->detach($hotel);

        return response()->noContent();
    }
}

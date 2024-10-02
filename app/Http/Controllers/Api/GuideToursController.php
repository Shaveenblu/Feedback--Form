<?php
namespace App\Http\Controllers\Api;

use App\Models\Tour;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TourCollection;

class GuideToursController extends Controller
{
    public function index(Request $request, Guide $guide): TourCollection
    {
        $this->authorize('view', $guide);

        $search = $request->get('search', '');

        $tours = $guide
            ->tours()
            ->search($search)
            ->latest()
            ->paginate();

        return new TourCollection($tours);
    }

    public function store(Request $request, Guide $guide, Tour $tour): Response
    {
        $this->authorize('update', $guide);

        $guide->tours()->syncWithoutDetaching([$tour->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Guide $guide,
        Tour $tour
    ): Response {
        $this->authorize('update', $guide);

        $guide->tours()->detach($tour);

        return response()->noContent();
    }
}

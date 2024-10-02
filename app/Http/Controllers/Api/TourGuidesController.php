<?php
namespace App\Http\Controllers\Api;

use App\Models\Tour;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuideCollection;

class TourGuidesController extends Controller
{
    public function index(Request $request, Tour $tour): GuideCollection
    {
        $this->authorize('view', $tour);

        $search = $request->get('search', '');

        $guides = $tour
            ->guides()
            ->search($search)
            ->latest()
            ->paginate();

        return new GuideCollection($guides);
    }

    public function store(Request $request, Tour $tour, Guide $guide): Response
    {
        $this->authorize('update', $tour);

        $tour->guides()->syncWithoutDetaching([$guide->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Tour $tour,
        Guide $guide
    ): Response {
        $this->authorize('update', $tour);

        $tour->guides()->detach($guide);

        return response()->noContent();
    }
}

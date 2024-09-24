<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Guide;
use App\Models\Question;
use App\Models\Customer;
use Illuminate\View\View;
use App\Models\FeedBackForm;
use Illuminate\Http\Request;
use App\Models\ResponseType;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FeedBackFormStoreRequest;
use App\Http\Requests\FeedBackFormUpdateRequest;

class FeedBackFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', FeedBackForm::class);

        $search = $request->get('search', '');

        $feedBackForms = FeedBackForm::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.feed_back_forms.index',
            compact('feedBackForms', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', FeedBackForm::class);

        $questions = Question::pluck('question', 'id');
        $customers = Customer::pluck('customer_name', 'id');
        $responseTypes = ResponseType::pluck('name', 'id');
        $hotels = Hotel::pluck('hotel_name', 'id');
        $guides = Guide::pluck('unique_id', 'id');
        $tours = Tour::pluck('unique_id', 'id');

        return view(
            'app.feed_back_forms.create',
            compact(
                'questions',
                'customers',
                'responseTypes',
                'hotels',
                'guides',
                'tours'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedBackFormStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', FeedBackForm::class);

        $validated = $request->validated();

        $feedBackForm = FeedBackForm::create($validated);

        return redirect()
            ->route('feed-back-forms.edit', $feedBackForm)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, FeedBackForm $feedBackForm): View
    {
        $this->authorize('view', $feedBackForm);

        return view('app.feed_back_forms.show', compact('feedBackForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, FeedBackForm $feedBackForm): View
    {
        $this->authorize('update', $feedBackForm);

        $questions = Question::pluck('question', 'id');
        $customers = Customer::pluck('customer_name', 'id');
        $responseTypes = ResponseType::pluck('name', 'id');
        $hotels = Hotel::pluck('hotel_name', 'id');
        $guides = Guide::pluck('unique_id', 'id');
        $tours = Tour::pluck('unique_id', 'id');

        return view(
            'app.feed_back_forms.edit',
            compact(
                'feedBackForm',
                'questions',
                'customers',
                'responseTypes',
                'hotels',
                'guides',
                'tours'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FeedBackFormUpdateRequest $request,
        FeedBackForm $feedBackForm
    ): RedirectResponse {
        $this->authorize('update', $feedBackForm);

        $validated = $request->validated();

        $feedBackForm->update($validated);

        return redirect()
            ->route('feed-back-forms.edit', $feedBackForm)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        FeedBackForm $feedBackForm
    ): RedirectResponse {
        $this->authorize('delete', $feedBackForm);

        $feedBackForm->delete();

        return redirect()
            ->route('feed-back-forms.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\FeedBackForm::class)
                <a
                    href="{{ route('feed-back-forms.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.feed_back_forms.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.question_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.customer_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.response_type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.hotel_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.guide_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.tour_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.customer_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.customer_tel_phone_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.date')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feedBackForms as $feedBackForm)
                        <tr>
                            <td>
                                {{ optional($feedBackForm->question)->question
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($feedBackForm->question2)->customer_name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($feedBackForm->responseType)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($feedBackForm->hotel)->hotel_name ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($feedBackForm->guide)->unique_id ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($feedBackForm->tour)->unique_id ??
                                '-' }}
                            </td>
                            <td>{{ $feedBackForm->customer_name ?? '-' }}</td>
                            <td>
                                {{ $feedBackForm->customer_tel_phone_number ??
                                '-' }}
                            </td>
                            <td>{{ $feedBackForm->date ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $feedBackForm)
                                    <a
                                        href="{{ route('feed-back-forms.edit', $feedBackForm) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $feedBackForm)
                                    <a
                                        href="{{ route('feed-back-forms.show', $feedBackForm) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $feedBackForm)
                                    <form
                                        action="{{ route('feed-back-forms.destroy', $feedBackForm) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                {!! $feedBackForms->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

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
                                @lang('crud.feed_back_forms.inputs.tour_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.customer_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.feed_back_forms.inputs.customer_tel_phone_number')
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
                                    {{ optional($feedBackForm->tour)->unique_id ??
                                    '-' }}
                                   ( <strong> {{ optional($feedBackForm->tour)->tour_name ?? '-' }}  </strong> )
                                </td>
                                <td>{{ $feedBackForm->customer_name ?? '-' }}</td>
                                <td>
                                    {{ $feedBackForm->customer_tel_phone_number ??
                                    '-' }}
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

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('feed-back-forms.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.feed_back_forms.show_title')
            </h4>
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.question_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.customer_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.response_type_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.hotel_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.guide_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.tour_id')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.customer_name')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.customer_tel_phone_number')</th>
                        <th scope="col">@lang('crud.feed_back_forms.inputs.date')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ optional($feedBackForm->question)->question ?? '-'}}</th>
                        <td>{{ optional($feedBackForm->question2)->customer_name ?? '-' }}</td>
                        <td>{{ optional($feedBackForm->responseType)->name ?? '-'}}</td>
                        <td>{{ optional($feedBackForm->hotel)->hotel_name ?? '-'}}</td>
                        <td>{{ optional($feedBackForm->guide)->unique_id ?? '-'}}</td>
                        <td>
                            <p>
                               <strong> tour number </strong> : {{ optional($feedBackForm->tour)->unique_id ?? '-'}}
                            </p>
                            <p>
                                <strong> tour name </strong>  :    {{ optional($feedBackForm->tour)->tour_name ?? '-'}}
                            </p>
                        </td>
                        <td>{{ $feedBackForm->customer_name ?? '-' }}</td>
                        <td>{{ $feedBackForm->customer_tel_phone_number ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($feedBackForm->date)->toDateString() ?? '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ route('feed-back-forms.index') }}"
                    class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

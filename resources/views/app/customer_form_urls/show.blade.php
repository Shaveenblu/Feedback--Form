@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('customer-form-urls.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.customer_form_urls.show_title')
            </h4>
            <div class="mt-4">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.url_link')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.unique_id')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.customer_id')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.tour_id')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.status')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.date')</th>
                        <th scope="col">@lang('crud.customer_form_urls.inputs.other_details')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><a href="{{ $customerFormUrl->url_link ?? '-' }}">{{ $customerFormUrl->url_link ?? '-' }}</a></th>
                        <td>{{ $customerFormUrl->unique_id ?? '-' }}</td>
                        <td>{{ optional($customerFormUrl->customer)->customer_name ?? '-' }}</td>
                        <td>{{ optional($customerFormUrl->tour)->unique_id ?? '-'}}</td>
                        <td>{{ $customerFormUrl->status ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($customerFormUrl->date)->toDateString() ?? '-' }}</td>
                        <td>{{ $customerFormUrl->other_details ?? '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ route('customer-form-urls.index') }}"
                    class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

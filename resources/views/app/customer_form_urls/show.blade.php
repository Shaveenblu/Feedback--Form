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
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.url_link')</h5>
                    <span>
                        <a href="{{ $customerFormUrl->url_link ?? '-' }}">
                            {{ $customerFormUrl->url_link ?? '-' }}
                        </a>
                    </span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.unique_id')</h5>
                    <span>{{ $customerFormUrl->unique_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.customer_id')</h5>
                    <span
                        >{{ optional($customerFormUrl->customer)->customer_name
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.tour_id')</h5>
                    <span
                        >{{ optional($customerFormUrl->tour)->unique_id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.status')</h5>
                    <span>{{ $customerFormUrl->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customer_form_urls.inputs.date')</h5>
                    <span>{{ \Carbon\Carbon::parse($customerFormUrl->date)->toDateString() ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.customer_form_urls.inputs.other_details')
                    </h5>
                    <span>{{ $customerFormUrl->other_details ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('customer-form-urls.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

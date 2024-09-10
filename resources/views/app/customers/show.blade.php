@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('customers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.customers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.customer_name')</h5>
                    <span>{{ $customer->customer_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.customers.inputs.customer_phone_number')
                    </h5>
                    <span>{{ $customer->customer_phone_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.tour_no')</h5>
                    <span>{{ $customer->tour_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.customers.inputs.unique_id')</h5>
                    <span>{{ $customer->unique_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('customers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Customer::class)
                <a href="{{ route('customers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

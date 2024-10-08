@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('customers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.customers.edit_title')
            </h4>
            <x-form method="PUT"
                action="{{ route('customers.update', $customer) }}"
                class="mt-4">
                @include('app.customers.form-inputs')
                <div class="mt-4">
                    <a href="{{ route('customers.index') }}"
                        class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Hotels</h4>
            <livewire:customer-hotels-detail :customer="$customer" />
        </div>
    </div>
</div>
@endsection

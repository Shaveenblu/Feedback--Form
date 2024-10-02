@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('hotels.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.hotels.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.hotels.inputs.hotel_name')</h5>
                    <span>{{ $hotel->hotel_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.hotels.inputs.hotel_place')</h5>
                    <span>{{ $hotel->hotel_place ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.hotels.inputs.unique_id')</h5>
                    <span>{{ $hotel->unique_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('hotels.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Hotel::class)
                <a href="{{ route('hotels.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

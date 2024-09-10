@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tours.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tours.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tours.inputs.unique_id')</h5>
                    <span>{{ $tour->unique_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tours.inputs.tour_operator')</h5>
                    <span>{{ $tour->tour_operator ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tours.inputs.tour_name')</h5>
                    <span>{{ $tour->tour_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tours.inputs.tour_start_date')</h5>
                    <span>{{ $tour->tour_start_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tours.inputs.tour_no')</h5>
                    <span>{{ $tour->tour_no ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tours.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Tour::class)
                <a href="{{ route('tours.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

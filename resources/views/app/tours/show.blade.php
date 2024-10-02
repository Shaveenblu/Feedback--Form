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
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">@lang('crud.tours.inputs.unique_id')</th>
                        <th scope="col">@lang('crud.tours.inputs.tour_operator')</th>
                        <th scope="col">@lang('crud.tours.inputs.tour_name')</th>
                        <th scope="col">@lang('crud.tours.inputs.tour_start_date')</th>
                        <th scope="col">@lang('crud.tours.inputs.tour_no')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $tour->unique_id ?? '-' }}</th>
                        <td>{{ $tour->tour_operator ?? '-' }}</td>
                        <td>{{ $tour->tour_name ?? '-' }}</td>
                        <td>{{ $tour->tour_start_date ?? '-' }}</td>
                        <td>{{ $tour->tour_no ?? '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <hr>
            <div class="mb-4">
                <h5><u> <strong>Guid </strong>  </u></h5>
                @isset($guide_tours)
                    @if($guide_tours->count() > 0)
                            @foreach($guide_tours  as $key => $guid)
                                <p class="bg-primary"> {{++$key}} ) {{ $guid->guid_first_name ?? '-' }} {{ $guid->guid_last_name ?? '-' }}</p>
                            @endforeach
                    @else
                        No Data
                    @endif
                @endisset
            </div>
            <div class="mt-4">
                <a href="{{ route('tours.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

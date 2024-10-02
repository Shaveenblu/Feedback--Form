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
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Record No</th>
                        <th scope="col">@lang('crud.customers.inputs.customer_name')</th>
                        <th scope="col">@lang('crud.customers.inputs.customer_phone_number')</th>
                        <th scope="col">@lang('crud.customers.inputs.tour_no')</th>
                        <th scope="col">@lang('crud.customers.inputs.unique_id')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $customer->unique_id ?? '-' }}</th>
                        <td>{{ $customer->customer_name ?? '-' }}</td>
                        <td>{{ $customer->customer_phone_number ?? '-' }}</td>
                        <td>{{ $customer->tour_no ?? '-' }}</td>
                        <td>{{ $customer->unique_id ?? '-' }}</td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <div class="mb-4">
                    <h5><u> <strong>Selected Hotels </strong>  </u></h5>
                        @isset($customer_hotel)
                          @if($customer_hotel->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Hotel Name</th>
                                    <th scope="col">Hotel Place</th>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($customer_hotel as $hotel)
                                 <tr>
                                     <th scope="row"> <span class="bg-danger p-2"> {{ $hotel->hotel_name ?? '-' }} </span> </th>
                                     <td> <span class="bg-primary p-2"> {{ $hotel->hotel_place ?? '-' }} </span> </td>
                                 </tr>
                             @endforeach
                                </tbody>
                            </table>
                          @else
                              No Data
                          @endif
                        @endisset
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('customers.index') }}" class="btn btn-light border-dark">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

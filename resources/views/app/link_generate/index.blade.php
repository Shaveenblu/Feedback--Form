@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title mt-2 mb-2">Select Customer & Generate Link</h4>
            </div>
            <form action="{{route('customer-form-urls.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('POST')
                <div class="form-group col-sm-12">
                     <select name="customer_id" class="form-control" id="favorite-colors"  required>
                         <option value="" disabled selected>Select Customer</option>
                        @isset($customers)
                            @if($customers->count() > 0)
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                @endforeach
                            @endif
                        @endisset
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-settings"></i>
                        Generate Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

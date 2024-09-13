@php $editing = isset($customer) @endphp

<div class="row">
    <div class="form-group col-sm-12">
        <label for="customerName">Customer Name</label>
        <input
            id="customerName"
            class="form-control"
            type="text"
            name="customer_name"
            value="{{old('customer_name', ($editing ? $customer->customer_name : ''))}}"
            maxlength="255"
            placeholder="Customer Name"
            required>
    </div>
    <div class="form-group col-sm-12">
        <label for="customerPhoneNumber">Customer Phone Number</label>
        <input
            class="form-control"
            id="customerPhoneNumber"
            type="text"
            name="customer_phone_number"
            label="Customer Phone Number"
            value="{{old('customer_phone_number', ($editing ? $customer->customer_phone_number : ''))}}"
            maxlength="255"
            placeholder="Customer Phone Number"
            required>
    </div>
    <div class="form-group col-sm-12">
        <label for="tourNumber">Tour Number</label>
        <select class="form-select form-select-lg mb-3 form-control" name="tour_no" aria-label=".form-select-lg example">
            <option selected disabled>Open this select menu</option>
            @if($editing)
                <option value="{{$customer->tour_no}}" selected>{{$customer->tour_no}}</option>
            @else
                <option value="" selected disabled>Select Status</option>
            @endif
            @foreach($tours as $tour)
                <option value="{{$tour->tour_no}}">{{$tour->tour_no}}</option>
            @endforeach
        </select>
    </div>
    @if(!$editing)
        <div class="form-group col-sm-12">
            <label for="unique_id">Select Hotels</label>
            <select name="hotels[]" class="form-control" id="favorite-colors"  multiple required>
                @foreach($hotels as $hotel)
                    <option value="{{$hotel->id}}">{{$hotel->hotel_name}}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>


@section('style_link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007BFF;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #ffffff;
        }
    </style>
@endsection

@section('js_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function () {
            $('#favorite-colors').select2();
        })
     </script>
@endsection

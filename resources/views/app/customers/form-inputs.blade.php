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
        <input
            class="form-control"
            id="tourNumber"
            type="text"
            name="tour_no"
            label="Tour No"
            value="{{old('tour_no', ($editing ? $customer->tour_no : ''))}}"
            maxlength="255"
            placeholder="Tour No"
            required>
    </div>
    <div class="form-group col-sm-12">
        <label for="unique_id">Unique Id</label>
        <input
            class="form-control"
            type="text"
            id="unique_id"
            name="unique_id"
            label="Unique Id"
            value="{{old('unique_id', ($editing ? $customer->unique_id : ''))}}"
            maxlength="255"
            placeholder="Unique Id"
            required>
    </div>
</div>

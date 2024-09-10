@php $editing = isset($customer) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="customer_name"
            label="Customer Name"
            :value="old('customer_name', ($editing ? $customer->customer_name : ''))"
            maxlength="255"
            placeholder="Customer Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="customer_phone_number"
            label="Customer Phone Number"
            :value="old('customer_phone_number', ($editing ? $customer->customer_phone_number : ''))"
            maxlength="255"
            placeholder="Customer Phone Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tour_no"
            label="Tour No"
            :value="old('tour_no', ($editing ? $customer->tour_no : ''))"
            maxlength="255"
            placeholder="Tour No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $customer->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

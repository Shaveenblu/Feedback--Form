@php $editing = isset($hotel) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="hotel_name"
            label="Hotel Name"
            :value="old('hotel_name', ($editing ? $hotel->hotel_name : ''))"
            maxlength="255"
            placeholder="Hotel Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="hotel_place"
            label="Hotel Place"
            :value="old('hotel_place', ($editing ? $hotel->hotel_place : ''))"
            maxlength="255"
            placeholder="Hotel Place"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

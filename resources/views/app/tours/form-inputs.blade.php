@php $editing = isset($tour) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $tour->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tour_operator"
            label="Tour Operator"
            :value="old('tour_operator', ($editing ? $tour->tour_operator : ''))"
            maxlength="255"
            placeholder="Tour Operator"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tour_name"
            label="Tour Name"
            :value="old('tour_name', ($editing ? $tour->tour_name : ''))"
            maxlength="255"
            placeholder="Tour Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="tour_start_date"
            label="Tour Start Date"
            value="{{ old('tour_start_date', ($editing ? optional($tour->tour_start_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tour_no"
            label="Tour No"
            :value="old('tour_no', ($editing ? $tour->tour_no : ''))"
            maxlength="255"
            placeholder="Tour No"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

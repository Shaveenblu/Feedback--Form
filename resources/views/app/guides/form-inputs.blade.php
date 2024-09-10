@php $editing = isset($guide) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $guide->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="guid_first_name"
            label="Guid First Name"
            :value="old('guid_first_name', ($editing ? $guide->guid_first_name : ''))"
            maxlength="255"
            placeholder="Guid First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="guid_last_name"
            label="Guid Last Name"
            :value="old('guid_last_name', ($editing ? $guide->guid_last_name : ''))"
            maxlength="255"
            placeholder="Guid Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

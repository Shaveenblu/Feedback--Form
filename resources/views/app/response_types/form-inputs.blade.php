@php $editing = isset($responseType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $responseType->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $responseType->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

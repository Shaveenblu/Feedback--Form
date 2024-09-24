@php $editing = isset($customerFormUrl) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="url_link"
            label="Url Link"
            :value="old('url_link', ($editing ? $customerFormUrl->url_link : ''))"
            maxlength="255"
            placeholder="Url Link"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $customerFormUrl->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="customer_id" label="Customer" required>
            @php $selected = old('customer_id', ($editing ? $customerFormUrl->customer_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Customer</option>
            @foreach($customers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tour_id" label="Tour" required>
            @php $selected = old('tour_id', ($editing ? $customerFormUrl->tour_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tour</option>
            @foreach($tours as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $customerFormUrl->status : '')) @endphp
            <option value="Completed" {{ $selected == 'Completed' ? 'selected' : '' }} >Completed</option>
            <option value="In Progress" {{ $selected == 'In Progress' ? 'selected' : '' }} >In progress</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($customerFormUrl->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="other_details"
            label="Other Details"
            :value="old('other_details', ($editing ? $customerFormUrl->other_details : ''))"
            maxlength="255"
            placeholder="Other Details"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

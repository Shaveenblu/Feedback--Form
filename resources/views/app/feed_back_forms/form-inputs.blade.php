@php $editing = isset($feedBackForm) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="question_id" label="Question" required>
            @php $selected = old('question_id', ($editing ? $feedBackForm->question_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Question</option>
            @foreach($questions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="customer_id" label="Question2" required>
            @php $selected = old('customer_id', ($editing ? $feedBackForm->customer_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Customer</option>
            @foreach($customers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="response_type_id" label="Response Type" required>
            @php $selected = old('response_type_id', ($editing ? $feedBackForm->response_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Response Type</option>
            @foreach($responseTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hotel_id" label="Hotel">
            @php $selected = old('hotel_id', ($editing ? $feedBackForm->hotel_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hotel</option>
            @foreach($hotels as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="guide_id" label="Guide">
            @php $selected = old('guide_id', ($editing ? $feedBackForm->guide_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Guide</option>
            @foreach($guides as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tour_id" label="Tour">
            @php $selected = old('tour_id', ($editing ? $feedBackForm->tour_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tour</option>
            @foreach($tours as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="customer_name"
            label="Customer Name"
            :value="old('customer_name', ($editing ? $feedBackForm->customer_name : ''))"
            maxlength="255"
            placeholder="Customer Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="customer_tel_phone_number"
            label="Customer Tel Phone Number"
            :value="old('customer_tel_phone_number', ($editing ? $feedBackForm->customer_tel_phone_number : ''))"
            maxlength="255"
            placeholder="Customer Tel Phone Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($feedBackForm->date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>
</div>

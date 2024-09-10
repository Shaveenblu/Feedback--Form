@php $editing = isset($question) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="question"
            label="Question"
            :value="old('question', ($editing ? $question->question : ''))"
            maxlength="255"
            placeholder="Question"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="question_category_id"
            label="Question Category"
            required
        >
            @php $selected = old('question_category_id', ($editing ? $question->question_category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Question Category</option>
            @foreach($questionCategories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="unique_id"
            label="Unique Id"
            :value="old('unique_id', ($editing ? $question->unique_id : ''))"
            maxlength="255"
            placeholder="Unique Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

@php $editing = isset($tour) @endphp

<div class="row">

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
    @if(!$editing)
        <div class="form-group col-sm-12">
            <label for="guides">Select Guide</label>
            <select name="guides[]" class="form-control" id="favorite-colors"  multiple required>
                @foreach($guides as $guide)
                    <option value="{{$guide->id}}">{{$guide->guid_first_name}} {{$guide->guid_last_name}}</option>
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




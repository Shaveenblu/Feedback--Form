@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('question-categories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.question_categories.edit_title')
            </h4>

            <x-form method="PUT"
                action="{{ route('question-categories.update', $questionCategory) }}"
                class="mt-4">
                @include('app.question_categories.form-inputs')
                <div class="mt-4">
                    <a
                        href="{{ route('question-categories.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection

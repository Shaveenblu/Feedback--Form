@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('questions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.questions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.questions.inputs.question')</h5>
                    <span>{{ $question->question ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.questions.inputs.question_category_id')</h5>
                    <span
                        >{{ optional($question->questionCategory)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.questions.inputs.unique_id')</h5>
                    <span>{{ $question->unique_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('questions.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Question::class)
                <a href="{{ route('questions.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

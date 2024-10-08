@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('question-categories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.question_categories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.question_categories.inputs.name')</h5>
                    <span>{{ $questionCategory->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.question_categories.inputs.unique_id')</h5>
                    <span>{{ $questionCategory->unique_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('question-categories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

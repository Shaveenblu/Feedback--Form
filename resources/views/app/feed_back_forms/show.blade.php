@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('feed-back-forms.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.feed_back_forms.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.question_id')</h5>
                    <span
                        >{{ optional($feedBackForm->question)->question ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.customer_id')</h5>
                    <span
                        >{{ optional($feedBackForm->question2)->customer_name ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.feed_back_forms.inputs.response_type_id')
                    </h5>
                    <span
                        >{{ optional($feedBackForm->responseType)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.hotel_id')</h5>
                    <span
                        >{{ optional($feedBackForm->hotel)->hotel_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.guide_id')</h5>
                    <span
                        >{{ optional($feedBackForm->guide)->unique_id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.tour_id')</h5>
                    <span
                        >{{ optional($feedBackForm->tour)->unique_id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.customer_name')</h5>
                    <span>{{ $feedBackForm->customer_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.feed_back_forms.inputs.customer_tel_phone_number')
                    </h5>
                    <span
                        >{{ $feedBackForm->customer_tel_phone_number ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.feed_back_forms.inputs.date')</h5>
                    <span>{{ $feedBackForm->date ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('feed-back-forms.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\FeedBackForm::class)
                <a
                    href="{{ route('feed-back-forms.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

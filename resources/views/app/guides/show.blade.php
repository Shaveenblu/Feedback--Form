@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('guides.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.guides.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.guides.inputs.unique_id')</h5>
                    <span>{{ $guide->unique_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.guides.inputs.guid_first_name')</h5>
                    <span>{{ $guide->guid_first_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.guides.inputs.guid_last_name')</h5>
                    <span>{{ $guide->guid_last_name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('guides.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Guide::class)
                <a href="{{ route('guides.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

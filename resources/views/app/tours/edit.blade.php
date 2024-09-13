@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tours.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tours.edit_title')
            </h4>

            <x-form method="PUT"
                action="{{ route('tours.update', $tour) }}"
                class="mt-4">
                @include('app.tours.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('tours.index') }}" class="btn btn-light">
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

    @can('view-any', App\Models\guide_tour::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Guides</h4>

            <livewire:tour-guides-detail :tour="$tour" />
        </div>
    </div>
    @endcan
</div>
@endsection

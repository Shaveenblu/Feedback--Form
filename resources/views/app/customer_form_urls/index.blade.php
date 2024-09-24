@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\CustomerFormUrl::class)
                <a
                    href="{{ route('customer-form-urls.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.customer_form_urls.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.customer_form_urls.inputs.url_link')
                            </th>
                            <th class="text-left">
                                @lang('crud.customer_form_urls.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.customer_form_urls.inputs.customer_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.customer_form_urls.inputs.tour_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customerFormUrls as $customerFormUrl)
                        <tr>
                            <td>
                                <a href="{{ $customerFormUrl->url_link ?? '-' }}">
                                    {{ $customerFormUrl->url_link ?? '-' }}
                                </a>
                            </td>
                            <td>
                                @if($customerFormUrl->status == 'Completed')
                                    <span class="btn btn-success">  {{ $customerFormUrl->status ?? '-' }} </span>
                                @elseif($customerFormUrl->status == 'In Progress')
                                    <span class="btn btn-danger"> {{ $customerFormUrl->status ?? '-' }}</span>
                                @endif
                            </td>
                            <td>
                                {{
                                optional($customerFormUrl->customer)->customer_name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($customerFormUrl->tour)->unique_id
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
{{--                                    @can('update', $customerFormUrl)--}}
{{--                                    <a--}}
{{--                                        href="{{ route('customer-form-urls.edit', $customerFormUrl) }}"--}}
{{--                                    >--}}
{{--                                        <button--}}
{{--                                            type="button"--}}
{{--                                            class="btn btn-light"--}}
{{--                                        >--}}
{{--                                            <i class="icon ion-md-create"></i>--}}
{{--                                        </button>--}}
{{--                                    </a>--}}
{{--                                    @endcan --}}
                                        @can('view', $customerFormUrl)
                                    <a
                                        href="{{ route('customer-form-urls.show', $customerFormUrl) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan
{{--                                        @can('delete', $customerFormUrl)--}}
{{--                                    <form--}}
{{--                                        action="{{ route('customer-form-urls.destroy', $customerFormUrl) }}"--}}
{{--                                        method="POST"--}}
{{--                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"--}}
{{--                                    >--}}
{{--                                        @csrf @method('DELETE')--}}
{{--                                        <button--}}
{{--                                            type="submit"--}}
{{--                                            class="btn btn-light text-danger"--}}
{{--                                        >--}}
{{--                                            <i class="icon ion-md-trash"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                    @endcan--}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {!! $customerFormUrls->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

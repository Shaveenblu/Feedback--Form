<div>
    <div class="mb-4">
        @can('create', App\Models\Hotel::class)
        <button class="btn btn-primary" wire:click="newHotel">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.attach')
        </button>
        @endcan
    </div>

    <x-modal id="customer-hotels-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="hotel_id"
                            label="Hotel"
                            wire:model="hotel_id"
                        >
                            <option value="null" disabled>Please select the Hotel</option>
                            @foreach($hotelsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                </div>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th class="text-left">
                        @lang('crud.customer_hotels.inputs.hotel_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($customerHotels as $hotel)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">{{ $hotel->hotel_name ?? '-' }}</td>
                    <td class="text-right" style="width: 70px;">
                        <div role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle">
                            @can('delete-any', App\Models\Hotel::class)
                              <button class="btn btn-light text-danger"
                                 data-target="#deleteModal_{{$hotel->id}}"
                                 data-toggle="modal">
                                <span class="btn btn-danger"> Delete </span>
                              </button>
                                <div class="modal fade" id="deleteModal_{{$hotel->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">No</button>
                                                <button class="btn btn-danger"
                                                        wire:click="detach('{{ $hotel->id }}')">
                                                    Yes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">{{ $customerHotels->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

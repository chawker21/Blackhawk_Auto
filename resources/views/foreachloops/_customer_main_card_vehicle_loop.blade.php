@foreach($customer_info->customer_vehicles as $vehicle)
    @if($vehicle->Vehicle_Model == '')
        @include("modals._additional_vehicle_modal", [ "classprop" => "btn-custom btn btn-primary btn-xs"])
    @elseif(($vehicle->Checked_in == null && $loop->last))
        <button type="button" class="btn-custom btn btn-primary btn-xs" data-toggle="modal" data-backdrop='false' data-target="#myVehicleSelectionCheckInOut{{$customer_info->id}}">
            Check vehicle in
        </button>
        <div id="myVehicleSelectionCheckInOut{{$customer_info->id}}" class="modal modal-custom">
            @include('components._vehicle_selection_modal', ['forloop' => 'foreachloops._vehicle_selection_check_in_loop'])
        </div>
    @elseif($customer_info->id === $vehicle->customer_info_id && ($vehicle->Checked_in === 1 || $vehicle->Checked_in === $current))
        @include('forms._vehicle_done_button')
        @include('components._vehicle_block', ['CheckOut' => 'CheckOut'])
        <hr class="hr-custom">
        <div class="clboth">
            @include('foreachloops._latest_invoice_for_each_vehicle_loop')
        </div>
        @include('foreachloops._latest_note_for_each_vehicle_loop')
        <button type="button" class="btn-custom btn btn-primary btn-xs clboth" data-toggle="modal" data-backdrop='false' data-target="#thisvehiclenote{{$vehicle->id}}">
            Note +
        </button>
        <div id="thisvehiclenote{{$vehicle->id}}" class="modal modal-custom">
            {{ html()->form('POST', route('vehicle.createNote', $vehicle->id))->open() }}
            @include('modals.modal_components._selected_vehicle_component', ['modaldescription' => 'Adds Note for Current vehicle.'])
        </div>
        <hr class="cardshadow">
    @endif
@endforeach


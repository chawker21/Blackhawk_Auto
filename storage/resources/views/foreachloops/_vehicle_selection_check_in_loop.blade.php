@foreach($customer_info->customer_vehicles as $vehicle)
    @if($vehicle->Checked_in !== 1)
        <button type="button" class="btn alert-info btn-xs lnkvehprim" style=""
                data-toggle="modal"
                data-backdrop='false' data-target="#CheckoutNote{{$vehicle->id}}">
            {{($vehicle->Vehicle_Year . '  ' . ucfirst($vehicle->Vehicle_Make) . '  ' . ucfirst($vehicle->Vehicle_Model))}}
        </button>
        <div id="CheckoutNote{{$vehicle->id}}" class="modal" tabindex="-1">
            {!! Form::model($vehicle, ['route' => ['vehicle.checkIncreateNote', $vehicle->id], 'files' => true])  !!}
            {!! Form::hidden('_method', 'PATCH') !!}
            @include('modals.modal_components._selected_vehicle_component', ['modaldescription' => 'Will also make vehicle currently checked in.'])
        </div>
    @endif
    <br>
@endforeach

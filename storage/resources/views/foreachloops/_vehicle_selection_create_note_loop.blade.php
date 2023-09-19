@foreach($customer_info->customer_vehicles as $vehicle)
    <button type="button" class="btn alert-info btn-xs lnkvehprim" style=""
            data-toggle="modal" data-backdrop='false'
            data-target="#myVehiclenote{{$vehicle->id}}">
        {{($vehicle->Vehicle_Year . '  ' . ucfirst($vehicle->Vehicle_Make) . '  ' . ucfirst($vehicle->Vehicle_Model))}}
    </button>
    <div id="myVehiclenote{{$vehicle->id}}" class="modal" tabindex="-1">
        {!! Form::open(['route' => ['vehicle.createNote', $vehicle->id]])  !!}
        @include('modals.modal_components._selected_vehicle_component', ['modaldescription' => 'This toggles the Vehicle checked in \ Out.'])

    </div>
    <br>
@endforeach

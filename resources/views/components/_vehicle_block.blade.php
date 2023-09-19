@if($vehicle->Vehicle_Model == '')
    @include("modals._additional_vehicle_modal", ["float" => "float:left;", "classprop" => "btn btn-primary btn-xs lnkvehprim"])
@else
    @include('components._current_vehicle_toggle_color_component')




    @if($vehicle->CheckOut == 0)
        <span style="">{{ strtoupper($vehicle['VIN']) }}</span>

        <!-- Check Out -->
        <form method="POST" action="{{ route('vehicle.check_Out', $vehicle->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-info btn-xs chk-btn $CheckOut" style="float:right; margin-top:-10%">Check Out</button>
        </form>


    @else



        <!-- Check In -->
        <form method="POST" action="{{ route('vehicle.check_Out', $vehicle->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary btn-xs chk-btn $CheckOut" style="float:right; margin-top:-10%">Check In</button>
        </form>


    @endif
@endif




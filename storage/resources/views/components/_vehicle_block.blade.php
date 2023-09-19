@if($vehicle->Vehicle_Model == '')
    @include("modals._additional_vehicle_modal", ["float" => "float:left;", "classprop" => "btn btn-primary btn-xs lnkvehprim"])
@else
    @include('components._current_vehicle_toggle_color_component')
        @VIN($vehicle)
        {!! Form::model($vehicle, ['route' => ['vehicle.updateVIN', $vehicle->id]])  !!}
        {!! Form::hidden('_method', 'PATCH') !!}
        {{ Form::text('VIN', null, ['class' => 'inwi form-control', 'style' => '']) }}
        {{ Form::submit ('VIN', ['class' => '  lnkveh inbt btn btn-success  btn-xs']) }}
        {!! Form::close() !!}
        @else
            <span style="">{!! strtoupper($vehicle['VIN']) !!}</span>
            @endVIN
            @current($vehicle)
            {!! Form::model($vehicle, ['route' => ['vehicle.check_Out', $vehicle->id]])  !!}
            {!! Form::hidden('_method', 'PATCH') !!}

            {{ Form::submit ('Check Out', ['class' => "btn btn-info  btn-xs chk-btn $CheckOut", 'style' => 'float:right; margin-top:-10%']) }}
            {!! Form::close() !!}
@else
    {!! Form::model($vehicle, ['route' => ['vehicle.check_Out', $vehicle->id]])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}
                {{ Form::submit ('Check In', ['class' => "btn btn-primary  btn-xs chk-btn $CheckOut", 'style' => " float:right; margin-top:-10%; " ]) }}
                {!! Form::close() !!}
            @endcurrent

           @endif

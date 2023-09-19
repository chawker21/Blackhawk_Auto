@VIN($vehicle)
{!! Form::model($vehicle, ['route' => ['vehicle.updateVIN', $vehicle->id]])  !!}
{!! Form::hidden('_method', 'PATCH') !!}

{{ Form::text('VIN', null, ['class' => 'inwi form-control']) }}
{{ Form::submit ('VIN', ['class' => '  lnkveh inbt btn btn-success  btn-xs']) }}
{!! Form::close() !!}
@else
    <p style="font-size:16px;">{!! strtoupper($vehicle['VIN']) !!}</p>
    @endVIN


@current($vehicle)
{!! Form::model($vehicle, ['route' => ['vehicle.done', $vehicle->id]])  !!}
{!! Form::hidden('_method', 'PATCH') !!}

{{ Form::submit ('X', ['class' => "btn btn-warning  btn-xs flo-r"]) }}
{!! Form::close() !!}
@endcurrent
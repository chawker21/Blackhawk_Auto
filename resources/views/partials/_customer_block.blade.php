<section>
    <h4 style="color:azure;">
        {{$customer_info->id }}
    </h4>
    <h3>
        {!! ucfirst($customer_info['First_Name']) !!} {!! ucfirst($customer_info['Last_Name']) !!}
    </h3>
    <h3>
        {!! $customer_info['Phone_Number'] !!}
    </h3>
@foreach($customer_info->customer_vehicles as $vehicle)
    @current($customer_info, $vehicle)

    {!! ucwords($vehicle['Vehicle_Year']) !!} {!! ucwords($vehicle['Vehicle_Make']) !!} {!! ucwords($vehicle['Vehicle_Model']) !!}
    {!! Form::model($vehicle, ['route' => ['vehicle.check_In', $vehicle->id]])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}
    {{ Form::submit ('Check In', ['class' => 'btn btn-primary  btn-xs chk-btn', 'style' => 'float:right; margin-right:30%']) }}
    {!! Form::close() !!}
    {!! Form::model($vehicle, ['route' => ['vehicle.check_Out', $vehicle->id]])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}
    {{ Form::submit ('Check Out', ['class' => 'btn btn-info  btn-xs chk-btn', 'style' => 'float:right;']) }}
    {!! Form::close() !!}
    <!-- If customer VIN is not entered will open input in its place -->
        @VIN($vehicle)

        {!! Form::model($vehicle, ['route' => ['vehicle.updateVIN', $vehicle->id]])  !!}
        {!! Form::hidden('_method', 'PATCH') !!}

        {{ Form::text('VIN', null, ['class' => 'inwi form-control']) }}
        {{ Form::submit ('VIN', ['class' => '  lnkveh inbt btn btn-success  btn-xs']) }}
        {!! Form::close() !!}

        @else
            {!! strtoupper($vehicle['VIN']) !!}

            @endVIN

            @endcurrent
            @endforeach
</section>


@current($vehicle)
<p style="color:limegreen; margin:0 0 0 0">
    <span class="{{$CheckOut}}" style="color:orange;">{{$loop->index +1}}.</span>

    <span style="">{{ $vehicle->Vehicle_Year }}
        {{ ucfirst($vehicle->Vehicle_Make) }}
        {{ ucfirst($vehicle->Vehicle_Model) }}</span>
</p>
@else
    <p style="color:slateblue; margin:0 0 0 0">
        <span style="color:orange;">{{$loop->index +1}}.</span>

        <span style="margin-left:8px;">{{ $vehicle->Vehicle_Year }}
            {{ ucfirst($vehicle->Vehicle_Make) }}
            {{ ucfirst($vehicle->Vehicle_Model) }}</span>
    </p>
    @endcurrent

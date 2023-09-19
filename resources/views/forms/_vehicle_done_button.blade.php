

@current($vehicle)
<form method="POST" action="{{ route('vehicle.done', $vehicle->id) }}">
    @csrf
    @method('PATCH')

    <button type="submit" class="btn btn-warning btn-xs flo-r">X</button>
</form>

@endcurrent

@foreach($vehicle->vehicle_notes as $note)
    @if($note->vehicle_info_id == $vehicle->id && $loop->last)
        <p>
            Latest Note: <span class="flo-r">{{ date( 'M j, Y ', strtotime($note->created_at))}}</span>
        </p>
        <p>
            {{$note->Additional_note}}
        </p>


    @endif
@endforeach
<div class="card text-white bg-dark mb-3 cardshadow cardprop" style="width:90%;">
    <div class="card-header">
        <h4 style="font-size:24px; color:orange;">
            Notes:
            <!-- Add Note Button, opens modal -->
            @if($customer_info->customer_vehicles->count() > 1)
                <button type="button" class="btn btn-primary btn-md lnkvehprim" style="float:right;" data-toggle="modal" data-backdrop='false'
                        data-target="#VehicleSelectionwithnote{{$customer_info->id}}">
                    Add Note
                </button>
                <div id="VehicleSelectionwithnote{{$customer_info->id}}" class="modal" tabindex="-1">
                    @include('components._vehicle_selection_modal', ['forloop' => 'foreachloops._vehicle_selection_create_note_loop'])
            @elseif($customer_info->customer_vehicles->count() == 1)
                @include('modals._add_vehicle_single_note', ["float" => "float:right;", 'addcheck' => 'Add Note', "classprop" => "btn btn-primary btn-md lnkvehprim"])
            @else
                <span style="float:right;">Add Vehicle First!!</span>
        @endif
        <!-- End Add Note Button, opens modal -->
        </h4>
    </div><!--End card-header-->
    <div class="card-body">
        @if($customer_info->customer_notes->count() > 0)
            <h3 class="card-title" style="color:darkorange; margin:0 10px 5px 0;">
                Latest Note: <span
                        style="float:right;">{{ date( 'M j, Y ', strtotime($customer_info->customer_notes->last()->updated_at)) }}</span>
            </h3>
            <p style="margin-left:40px;">
                {{ $customer_info->customer_notes->last()->Additional_note }}
                @else
                    Nothing to display...
                @endif
            </p>
            <hr style="border-color:darkorange; border-style:dashed;">
            <div class="card-text">
                <h3 class="card-title" style="font-size:16px; color:darkorange; margin:0 10px 5px 0;">
                    Customer Notes:<span
                            style="float:right;">total notes: {{$customer_info->customer_notes->count()}}</span>
                </h3>
                @foreach($customer_info->customer_notes as $note)
                    @if($note->vehicle_info_id == null)
                        <ul style="margin:0 10px 0 10px; font-size:14px;">
                            <li style="margin:0 0 0 30px;">
                                    <span>
                                        {{ date( 'M j, Y', strtotime($note->created_at)) }}
                                    </span>
                                <p style="margin:0 0 0 10px;">
                                    {!! $note['Additional_note'] !!}
                                </p>
                            </li>
                        </ul>
                    @endif
                @endforeach
                @foreach($customer_vehicle as $vehicle)
                    @if($vehicle->vehicle_notes->count() > 0)
                        @include('components._current_vehicle_toggle_color_component', ['CheckOut' => 'CheckOut', 'CheckIn' => 'Check In'])
                    @endif
                    @foreach($vehicle->vehicle_notes->reverse() as $note)
                        <ul style="margin:0 10px 0 10px; font-size:14px;">
                            <li style="margin:0 0 0 30px;">
                                    <span>
                                        {{ date( 'M j, Y', strtotime($note->created_at)) }}
                                    </span>
                                <p style="margin:0 0 0 10px;">
                                    {!! $note['Additional_note'] !!}
                                </p>
                            </li>
                        </ul>
                    @endforeach
                @endforeach
            </div>
    </div>
</div>
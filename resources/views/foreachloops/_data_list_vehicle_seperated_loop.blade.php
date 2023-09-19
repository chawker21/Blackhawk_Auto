@foreach($customer_info->customer_vehicles as $vehicle)
    @if($vehicle->data->count() > 0)
        @include('components._current_vehicle_toggle_color_component', ['CheckOut' => 'CheckOut', 'CheckIn' => 'Check In'])
        @foreach($vehicle->data as $data)


            <button type="button" class="btn btn-outline-success btn-block  "
                    data-toggle="modal" data-target="#vehicle{{$data->id}}">
                <span class="flo-l">data: {{$data->job_description}}</span><span style="float:right;">${{$data->data_total}}</span></button>

            <!-- Modal -->




            @if ( $data->type === 'Data' || 'data' )
                <ul class="invdeco">
                    <li>
                        <div class="modal" id="vehicle{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true" style="margin-left:30%;">


                            <div class="card cardshadow text-white bg-dark mb-3"
                                 style="height:700px; max-width: 1050px; margin-left:55px;">
                                <div class="card-body">
                                    <iframe id="boxshd" src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $data->data_name }}"
                                            height="600" width="650"></iframe>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">Close</span>
                                    </button>
                                </div>
                            </div></div>


                    </li>
                </ul>
            @endif

        @endforeach
    @endif
@endforeach
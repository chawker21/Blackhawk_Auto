@foreach($customer_info->customer_vehicles as $vehicle)
    @if($vehicle->invoices->count() > 0)
    @include('components._current_vehicle_toggle_color_component', ['CheckOut' => 'CheckOut', 'CheckIn' => 'Check In'])
    @foreach($vehicle->invoices as $invoice)
        <button type="button" class="btn btn-outline-success btn-block  "
           data-toggle="modal" data-target="#vehicle{{$invoice->id}}" data-backdrop="false">
            <span class="flo-l">Invoice: {{$invoice->job_description}}</span><span style="float:right;">${{$invoice->invoice_total}}</span></button>

                <!-- Modal -->
        @if ( $invoice->type === 'Invoice' || 'invoice' )
            <ul class="invdeco">
                <li>
                    <div class="modalmyinvoicecss cardshadow"  id="vehicle{{$invoice->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="card  text-white bg-dark mb-3"
                             >
                            <div class="card-header ">Invoice<button type="button" class="close btn-outline-warning btn-block flo-r" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Close</span>
                                </button></div>
                            <div class="card-body">
                                <iframe id="boxshd" src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $invoice->invoice_name }}#zoom=100"
                                        height="850"></iframe>
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
        @foreach($vehicle->data as $data)
            @if($vehicle->data->count() > 0)
                @include('components._current_vehicle_toggle_color_component', ['CheckOut' => 'CheckOut', 'CheckIn' => 'Check In'])
            <button type="button" class="btn btn-outline-info btn-block  "
                    data-toggle="modal"  data-backdrop="false" data-target="#vehicle{{$data->id}}">
                <span class="flo-l">Image: {{$data->job_description}}</span><span style="float:right;">Image</span></button>
            <!-- Modal -->
            @if ( $data->type === 'Data' || 'data' )
                <ul class="invdeco">
                    <li>
                        <div class="modalmycss  cardshadow" id="vehicle{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true" >
                            <div class="card text-white bg-dark mb-3 "
                                 >

                                <div class="card-header ">Images<button type="button" class="close btn-outline-warning btn-block flo-r" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">Close</span>
                                    </button></div>
                                <div class="card-body">
                                    <iframe id="boxshd" src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $data->data_name }}"
                                            height="850" width="650"></iframe>
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
            @endif
        @endforeach



    @endforeach

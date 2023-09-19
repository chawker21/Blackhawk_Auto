@foreach($vehicle->invoices as $invoice)
    @if($invoice->customer_info_id == $vehicle->id && $loop->last)

            <button type="button" class="btn btn-outline-success btn-block  "
                    data-toggle="modal" data-target="#vehicle{{$invoice->id}}" data-backdrop="false">
                <span class="flo-l">Invoice:</span></button>

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
                                    <img src="https://drive.google.com/uc?id=1-lJ59-zduqpjzNS2yFWgxzdtkekuSt2C" class="headimg" alt="car logo" height="335px" width="500px">
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="close btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">Close</span>
                                    </button>
                                </div>
                            </div></div>
                    </li>
                </ul>
            @endif

    @endif
@endforeach

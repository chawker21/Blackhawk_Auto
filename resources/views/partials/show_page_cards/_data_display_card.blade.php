<div class="card text-white bg-dark cardshadow"
     style=" width:95%;  margin:70px 40px 10px ; min-height: 50rem; float:right;">
    <div class="card-header">
        <h4 style="font-size:24px; color:darkorange;">
            Data Images:
            <button type="button" class="btn btn-warning btn-md lnkvehdata" style="float:right; width:120px;"
                    data-backdrop="false" data-toggle="modal" data-target="#myModaldata">
                Data Upload
            </button>

        </h4>
    </div>
    <div class="card-body">
        @foreach($data as $key=>$data)
            <div class="col-md-12 col-lg-12 shwimg">
                <img id="boxshd" src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $data->data_name }}" height="600"
                     style="margin-bottom:20px;"><br/>
            </div>
        @endforeach
        @foreach($invoices as $key=>$invoice)
            @if ($invoice->type == 'Data')
                <div class="col-md-12 col-lg-12 shwimg">
                    <img id="boxshd" src="https://s3-us-west-2.amazonaws.com/chawker21/{{ $invoice->invoice_name }}"
                         height="600" style="margin-bottom:20px;"><br/>
                </div>
            @endif
        @endforeach
    </div>
</div>

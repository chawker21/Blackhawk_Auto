<div class="card text-white bg-dark mb-3 card-col-90 cardshadow cardprop">
    <div class="card-header">
        <h4 class="cardheader">
            Upload Forms:</h4>
    </div>
    <div class="card-body">
{{--Add Invoice with vehicle selection modal--}}
        <div class="center">
            <button type="button" class="btn btn-success btn-md lnkveh btn-upload"
                    data-toggle="modal" data-backdrop='false'
                    data-target="#vehicleselectInvoice{{$customer_info->id}}">
                Add Invoice
            </button>
            <div id="vehicleselectInvoice{{$customer_info->id}}" class="modal" tabindex="-1">

                @include('components._vehicle_selection_modal', ['forloop' => 'foreachloops._vehicle_selection_invoice_upload_loop'])
            </div>
{{--End Add Invoice Start Data Upload with vehicle selection button modal--}}

            <button type="button" class="btn btn-warning btn-md lnkvehdata btn-upload" data-toggle="modal" data-backdrop="false"
                    data-target="#vehicleselectData{{$customer_info->id}}">
                Data Upload
            </button>

            <div id="vehicleselectData{{$customer_info->id}}" class="modal" tabindex="-1">

                @include('components._vehicle_selection_modal', ['forloop' => 'foreachloops._vehicle_selection_data_upload_loop'])
            </div>




    </div>
    {{--End Upload with vehicle selection button modal--}}
        <h3 class="cardsubheader">
            Invoices: <span class="flo-r">{{$customer_info->invoices->count()}}</span>
            {{--Data: <span class="flo-r">{{$customer_info->data->count()}}</span>--}}
        </h3>
        <hr class="carddash">
        @include('foreachloops._invoice_list_vehicle_seperated_loop')

        <hr>
<!-- Total for all Invoices inputed -->
        <p class="flo-r">
            invoice totals: ${{$total}}
        </p>
    </div>
</div>
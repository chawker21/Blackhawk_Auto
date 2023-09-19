<button type="button" class="btn alert-info btn-xs lnkvehprim" style="" data-toggle="modal" data-backdrop='false'
        data-target="#newInvoice{{$vehicle->id}}">
    {{($vehicle->Vehicle_Year . '  ' . ucfirst($vehicle->Vehicle_Make) . '  ' . ucfirst($vehicle->Vehicle_Model))}}
</button>


<div id="newInvoice{{$vehicle->id}}" class="modal" tabindex="-1">

    {!! Form::model($vehicle, ['route' => ['invoice.newInvoice', $vehicle->id], 'files' => true])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}

    <div class="modal-body" style="margin-left:40%;">

        <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 40rem; margin-left:15px;">
            <div class="card-header">Invoice Upload</div>
            <div class="card-body">
                <h4 class="card-title">Invoice</h4>
                <p class="card-text">  {{ Form::file('invoice') }}
                    <br>

                    {{ Form::label ('invoice_total', 'Invoice Total:') }}
                    {{ Form::text('invoice_total', '')}}
                    <br>
                    {{ Form::label ('job_description', 'Description:') }}
                    {{ Form::text('job_description', '')}}
                    <br></p>
            </div>
            {{ Form::submit ('Submit Info', ['class' => 'btn btn-success btn-lg btn-block lnkveh', 'style' => 'margin-top: 20px']) }}

            <br/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>



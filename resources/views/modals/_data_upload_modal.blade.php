
<button type="button" class="btn alert-info btn-xs lnkvehprim" style="" data-toggle="modal" data-backdrop='false'
        data-target="#newData{{$vehicle->id}}">
    {{($vehicle->Vehicle_Year . '  ' . ucfirst($vehicle->Vehicle_Make) . '  ' . ucfirst($vehicle->Vehicle_Model))}}
</button>



<div id="newData{{$vehicle->id}}" class="modal" tabindex="-1">

    {{ html()->form('POST', route('data.datauploadhandler', $vehicle->id))->attribute('enctype', 'multipart/form-data')->open() }}
    {{ html()->hidden('_method', 'PATCH') }}

    <div class="modal-body" style="margin-left:40%;">

        <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
            <div class="card-header">Image Upload</div>
            <div class="card-body">
                <h4 class="card-title">Data</h4>
                <p class="card-text">
                    {{ html()->input('file', 'data')->class('form-control') }}
                    <br>
                    {{ html()->label('Description:', 'job_description') }}
                    {{ html()->text('job_description')->value('') }}
                    <br>
                </p>
            </div>
            {{ html()->button('Submit Info')->type('submit')->class('btn btn-warning btn-lg btn-block lnkvehdata')->attribute('style', 'margin-top: 20px') }}
            <br/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    {{ html()->form()->close() }}
        </div>
    </div>
</div>

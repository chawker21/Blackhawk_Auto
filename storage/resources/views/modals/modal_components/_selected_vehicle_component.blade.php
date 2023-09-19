
<div class="modal-body" style="margin-left:35%; max-height:250px;">
    <div class="card-group">
        <div class="modal-body">
            <div class="row fullform">
                <div class="card text-white bg-dark mb-3" style="max-width: 25rem; ">
                    <div class="card-header">
                        Vehicle Note<br>
                        <small>{{$modaldescription}}</small>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ Form::label ('Additional_Info', 'New Note:') }}
                            <br/>
                            {{ Form::textarea('Additional_note', null, ['size' => '6x5', 'class' => ' form-control']) }}
                        </h4>
                    </div>
                </div>

<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">
        Vehicle<br>
        <small>selected vehicle.</small>
    </div>
    <div class="card-body">
        <h4 class="card-title" style="margin-top:0;">
            {{($vehicle->Vehicle_Year. '  ' . ucfirst($vehicle->Vehicle_Make). '  ' .ucfirst($vehicle->Vehicle_Model))}}
        </h4>
    </div>
    {{ Form::submit ('Submit Note', ['class' => 'btn btn-success btn-sm  lnkveh', 'style' => 'margin:40px 10px 0px 10px;']) }}
    <br/>
    <button type="button" class="btn btn-sm lnkveh btn-warning"
            style="margin:10px 10px 20px 10px;" data-dismiss="modal">Cancel
    </button>
    {!! Form::close() !!}
</div> </div>
        </div>
    </div>
</div>

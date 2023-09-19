<button type="button" class="btn alert-info btn-xs lnkvehprim" style="" data-toggle="modal" data-backdrop='false'
        data-target="#myVehiclenote{{$vehicle->id}}">
    {{($vehicle->Vehicle_Year . '  ' . ucfirst($vehicle->Vehicle_Make) . '  ' . ucfirst($vehicle->Vehicle_Model))}}
</button>

<div id="myVehiclenote{{$vehicle->id}}" class="modal" tabindex="-1">

    {!! Form::model($vehicle, ['route' => ['vehicle.checkIncreateNote', $vehicle->id], 'files' => true])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}
    <div class="modal-body" style="margin-left:40%;">
        <div class="card-group">
            <div class="modal-body">
                <div class="row fullform">
                    <div class="card text-white bg-dark mb-3" style="max-width: 40rem; ">
                        <div class="card-header">
                            Vehicle Note<br>
                            <small>This checks the customer in.</small>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="margin-top:0;">
                                {{ Form::label ('Additional_Info', 'New Note:') }}
                                <br/>
                                {{ Form::textarea('Additional_note', null, ['size' => '6x5', 'class' => ' form-control']) }}
                            </h4>
                        </div>
                    </div>

                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">
                            Vehicle<br>
                            <small>currently selected vehicle.</small>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="margin-top:0;">
                                {{($vehicle->Vehicle_Year. '  ' . ucfirst($vehicle->Vehicle_Make). '  ' .ucfirst($vehicle->Vehicle_Model))}}
                            </h4>
                        </div>
                        {{ Form::submit ('Submit Note', ['class' => 'btn btn-success btn-md btn-block lnkveh', 'style' => 'margin-top: 0']) }}
                        <br/>
                        <button type="button" class="btn btn-md" style="margin-bottom:20px;" data-dismiss="modal">
                            Cancel
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
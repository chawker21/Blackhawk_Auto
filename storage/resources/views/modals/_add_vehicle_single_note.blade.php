<button type="button" class="{{$classprop}}" style="{{$float}}" data-toggle="modal" data-backdrop='false'
        data-target="#myVehiclenote{{$customer_info->customer_vehicles[0]->id}}">
    {{$addcheck}}
</button>

<div id="myVehiclenote{{$customer_info->customer_vehicles[0]->id}}" class="modal" tabindex="-1">


    {!! Form::open(['route' => ['vehicle.createNote', $customer_info->customer_vehicles[0]->id]])  !!}

    <div class="modal-body" style="margin-left:40%;">
        <div class="card-group">
            <div class="modal-body">
                <div class="row fullform">

                    <div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
                        <div class="card-header">Vehicle Notes</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ Form::label ('Additional_Info', 'New Note:') }}
                                <br/>
                                {{ Form::textarea('Additional_note', null, ['class' => 'inwicustnote form-control']) }}
                            </h4>
                        </div>

                    </div>
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Vehicle</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{($customer_info->customer_vehicles[0]->Vehicle_Year. '  ' . ucfirst($customer_info->customer_vehicles[0]->Vehicle_Make). '  ' .ucfirst($customer_info->customer_vehicles[0]->Vehicle_Model))}}


                            </h4>

                        </div>
                        {{ Form::submit ('Submit Info', ['class' => 'btn btn-success btn-lg btn-block lnkveh', 'style' => 'margin-top: 20px']) }}
                        <br/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalnote" class="modal" tabindex="-1">


    {!! Form::open(['route' => ['customer.createNote', $customer_info->id]])  !!}

    <div class="modal-body" style="margin-left:30%;">
        <div class="card-group">
            <div class="modal-body">
                <div class="row fullform">

                    <div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
                        <div class="card-header">Notes</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ Form::label ('Additional_Info', 'Customer Notes:') }}
                                <br/>
                                {{ Form::textarea('Additional_Info', null, ['class' => 'inwicustnote form-control']) }}
                            </h4>
                        </div>

                    </div>
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                @foreach($customer_vehicle->reverse() as $vehicle)

                                    {{ Form::submit ($vehicle->Vehicle_Year.
                                  ucfirst($vehicle->Vehicle_Make).
                                  ucfirst($vehicle->Vehicle_Model), ['class' => 'btn btn-success btn-lg btn-block lnkveh', 'style' => 'margin-top: 20px']) }}
                                @endforeach


                            </h4>

                        </div>

                    </div>


                    <br/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
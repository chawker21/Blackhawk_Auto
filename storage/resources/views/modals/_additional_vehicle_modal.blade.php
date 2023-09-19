<!-- Modal MyModal2 Form Adds New Vehicle -->

<button type="button" class="{{$classprop}}"
        data-toggle="modal" data-backdrop='false' data-target="#myModal3">Add Vehicle
</button>
<!-- Modal -->
<div id="myModal3" class="modal" tabindex="-1">
    <div>
        {!! Form::model($customer_info, ['route' => ['customer.newVehicle', $customer_info->id]]) !!}
        {!! Form::hidden('_method', 'PATCH') !!}
        <div class="modal-body m-l-30">
            <div class="card-group">
                <div class="modal-body">
                    <div class="row fullform">
                        <div class="card card-modal-prop cardshadow text-white bg-dark mb-3">
                            <div class="card-header cardmodalheader">Vehicle Info</div>
                            <div class="card-body">
                                <h4 class="card-title card-modal-title">
                                    {{ Form::label ('Year', 'Year:') }}

                                    {{ Form::text('Vehicle_Year', null, ['class' => 'inwicust form-control form-input-prop'] ) }}

                                    {{ Form::label ('Make', 'Make:') }}<br>
                                    {{ Form::select('Vehicle_Make',[ 'Vehicle_Make' => ['' => 'None', 'Other' => 'Other', 'Acura' => 'Acura', 'Audi' => 'Audi', 'BMW' => 'BMW', 'Buick' => 'Buick', 'Cadillac' => 'Cadillac', 'Chevrolet' => 'Chevrolet', 'Chrysler' => 'Chrysler', 'Dodge' => 'Dodge', 'Ford' => 'Ford', 'GMC' => 'GMC', 'Honda' => 'Honda', 'Hyundai' => 'Hyundai', 'Infiniti' => 'Infiniti', 'Jeep' => 'Jeep', 'Kia' => 'Kia', 'Land Rover' => 'Land Rover', 'Lexus' => 'Lexus', 'Lincoln' => 'Lincoln', 'Mazda' => 'Mazda', 'Mercedes-Benz' => 'Mercedes-Benz','Mercury' =>
                                    'Mercury', 'Mini' => 'Mini', 'Mitsubishi' => 'Mitsubishi', 'Nissan' => 'Nissan', 'Oldsmobile' => 'Oldsmobile', 'Porsche' => 'Porsche', 'Pontiac' => 'Pontiac', 'Saab' => 'Saab', 'Saturn' => 'Saturn', 'Subaru' => 'Subaru', 'Suzuki' => 'Suzuki', 'Toyota' => 'Toyota', 'Volkswagen' => 'Volkswagen', 'Volvo' => 'Volvo' ]
                                    ], 'None', array('class' => ' form-input-prop', 'style' => 'color:black;')) }}
                                    <br>
                                    {{ Form::label ('Model', 'Model:') }}

                                    {{ Form::text('Vehicle_Model', null, ['class' => 'inwicust form-control form-input-prop']) }}

                                    {{ Form::label ('VIN', 'VIN:') }}

                                    {{ Form::text('VIN', null, ['class' => 'inwicust form-control form-input-prop']) }}
                                </h4>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-xs btn-block btn-warning lnkveh m-t-20"
                                        data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                        <div class="card card-modal-prop cardshadow text-white bg-dark mb-3">
                            <div class="card-header cardmodalheader">Additional Info</div>
                            <div class="card-body">

                                <h4 class="card-title card-modal-title">
                                    {{ Form::label ('Additional_Info', 'Customer Notes:') }}

                                    {{ Form::textarea('Additional_note', null, ['class' => 'inwicustnote form-control', 'size' => '4x6']) }}
                                </h4>
                            </div>
                            <div class="card-footer">
                                {{ Form::submit ('Submit Info', ['class' => 'btn btn-success btn-xs btn-block lnkveh m-t-20']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
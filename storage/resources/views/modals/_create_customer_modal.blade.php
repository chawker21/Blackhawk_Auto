<!-- Modal -->
<div id="myModal" class="modalcust" tabindex="-1">
    {!! Form::open(['route' => 'customer.store']) !!}
    <div class="modal-body">
        <div class="card-group">
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header" style="font-size:22px; color: #5075e3 ">Customer Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">{{ Form::label ('First', 'First:') }}
                        {{ Form::text('First_Name', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('Last', 'Last:') }}
                        {{ Form::text('Last_Name', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('Phone', 'Phone:') }}
                        {{ Form::text('Phone_Number', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('Email', 'Email:') }}
                        {{ Form::text('email', '.com', ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Vehicle Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ Form::label ('Year', 'Year:') }}
                        {{ Form::text('Vehicle_Year', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;'] ) }}
                        {{ Form::label ('Make', 'Make:') }}<br>
                        {{ Form::select('Vehicle_Make',[ 'Vehicle_Make' => ['' => 'None', 'Other' => 'Other', 'Acura' => 'Acura', 'Audi' => 'Audi', 'BMW' => 'BMW', 'Buick' => 'Buick', 'Cadillac' => 'Cadillac', 'Chevrolet' => 'Chevrolet', 'Chrysler' => 'Chrysler', 'Dodge' => 'Dodge', 'Ford' => 'Ford', 'GMC' => 'GMC', 'Honda' => 'Honda', 'Hyundai' => 'Hyundai', 'Infiniti' => 'Infiniti', 'Jeep' => 'Jeep', 'Kia' => 'Kia', 'Land Rover' => 'Land Rover', 'Lexus' => 'Lexus', 'Lincoln' => 'Lincoln', 'Mazda' => 'Mazda', 'Mercedes-Benz' => 'Mercedes-Benz','Mercury' =>
                        'Mercury', 'Mini' => 'Mini', 'Mitsubishi' => 'Mitsubishi', 'Nissan' => 'Nissan', 'Oldsmobile' => 'Oldsmobile', 'Porsche' => 'Porsche', 'Pontiac' => 'Pontiac', 'Saab' => 'Saab', 'Saturn' => 'Saturn', 'Subaru' => 'Subaru', 'Suzuki' => 'Suzuki', 'Toyota' => 'Toyota', 'Volkswagen' => 'Volkswagen', 'Volvo' => 'Volvo' ]
                        ], 'None', array('class' => '', 'style' => 'width:220px; margin-left:15px; color:black;')) }}
                        <br>
                        {{ Form::label ('Model', 'Model:') }}
                        {{ Form::text('Vehicle_Model', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('VIN', 'VIN:') }}
                        {{ Form::text('VIN', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Address</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ Form::label ('Address', 'Address:') }}
                        {{ Form::text('address', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('City', 'City:') }}
                        {{ Form::text('city', 'Draper', ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('State', 'State:') }}
                        {{ Form::text('state', 'Ut', ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('zipcode', 'zipcode:') }}
                        {{ Form::text('zipcode', '84020', ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}

                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Additional Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ Form::label ('Additional_Info', 'Customer Notes:') }}
                        {{ Form::textarea('Additional_note', null, ['class' => 'inwicustnote form-control', 'size' => '4x4']) }}
                        {{ Form::submit ('Submit Info', ['class' => 'btn btn-success btn-lg btn-block lnkveh', 'style' => 'margin-top: 20px;']) }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-2">

            {!! Form::close() !!}
        </div>
    </div>
</div>

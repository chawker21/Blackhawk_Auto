<!-- Modal MyModal2 Form Adds New Vehicle -->
<div id="myModal2{{$customer_info->id}}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content post">
            {!! Form::model($customer_info, ['route' => ['customer.store', $customer_info->id]]) !!}

            <div class="modal-header">
                <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal">

                </button>
                <h4 class="modal-title" id="myModalLabel">New Vehicle Info for
                </h4>
                <h3>{!! ucfirst($customer_info['First_Name']) !!}
                    {!! ucfirst($customer_info['Last_Name']) !!}</h3>
                <h3>{!! $customer_info['Phone_Number'] !!}</h3>

                <p style="font-size:14px; color:orange;">Use this form for individual customers,
                    Will create <i>NEW ENTRY</i> for customer , <br>For dealerships or
                    fleet/commercial accounts, click customers name and choose Add Vehicle.
                </p>
            </div>
            <div class="modal-body">
                <div class="row fullform">
                    {{ Form::hidden ('First_Name', 'First Name:') }}

                    {{ Form::hidden('First_Name', null, ['class' => 'inwicust form-control']) }}

                    {{ Form::hidden ('Last_Name', 'Last Name:') }}

                    {{ Form::hidden('Last_Name', null, ['class' => 'inwicust form-control']) }}

                    {{ Form::hidden ('Phone_Number', 'Phone Number:') }}

                    {{ Form::hidden('Phone_Number', null, ['class' => 'inwicust form-control']) }}

                    {{ Form::label ('Vehicle_Year', 'Vehicle Year:') }}

                    {{ Form::text('Vehicle_Year', '',  ['class' => 'inwicust form-control'] )  }}


                    {{ Form::label ('Vehicle_Make', 'Vehicle Make:') }}
                    {{ Form::select('Vehicle_Make',[ 'Vehicle_Make' => ['' => 'None', 'Other' => 'Other', 'Acura' => 'Acura', 'Audi' => 'Audi', 'BMW' => 'BMW', 'Buick' => 'Buick', 'Cadillac' => 'Cadillac', 'Chevrolet' => 'Chevrolet', 'Chrysler' => 'Chrysler', 'Dodge' => 'Dodge', 'Ford' => 'Ford', 'GMC' => 'GMC', 'Honda' => 'Honda', 'Hyundai' => 'Hyundai', 'Infiniti' => 'Infiniti', 'Jeep' => 'Jeep', 'Kia' => 'Kia', 'Land Rover' => 'Land Rover', 'Lexus' => 'Lexus', 'Lincoln' => 'Lincoln', 'Mazda' => 'Mazda', 'Mercedes-Benz' => 'Mercedes-Benz','Mercury' =>
                    'Mercury', 'Mini' => 'Mini', 'Mitsubishi' => 'Mitsubishi', 'Nissan' => 'Nissan', 'Oldsmobile' => 'Oldsmobile', 'Porsche' => 'Porsche', 'Pontiac' => 'Pontiac', 'Saab' => 'Saab', 'Saturn' => 'Saturn', 'Subaru' => 'Subaru', 'Suzuki' => 'Suzuki', 'Toyota' => 'Toyota', 'Volkswagen' => 'Volkswagen', 'Volvo' => 'Volvo' ]
                    ], 'None') }}



                    {{ Form::label ('Vehicle_Model', 'Vehicle Model:') }}

                    {{ Form::text('Vehicle_Model', '', ['class' => 'inwicust form-control']) }}
                    <br>
                    <br>
                    {{ Form::label ('VIN', 'Vehicle VIN:') }}

                    {{ Form::text('VIN', '', ['class' => 'inwicust form-control']) }}
                    <br>
                    <br>
                    {{ Form::label ('Additional_Info', 'Customer Notes:') }}
                    <br/>
                    {{ Form::textarea('Additional_Info', '', ['class' => 'inwicustnote form-control']) }}
                    {{ Form::label ('checked_in', 'Vehicle Check In:') }}
                    {{ Form::select('checked_in',[ 'Check in/out:' => ['1' => 'Check in', '0' => 'Check out' ]
                    ]) }}
                </div>
                <div class="modal-footer">
                    {{ Form::submit ('Submit Info', ['class' => 'btn btn-lg btn-success btn-block lnkveh', 'style' => 'margin-top: 20px']) }}
                    <br/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal MyModal2 -->
<!-- Modal -->
<div id="myModal" class="modalcust" tabindex="-1">
    {{ html()->form('POST', route('customer.store'))->open() }}
    <div class="modal-body">
        <div class="card-group">
            <!-- Customer Info Card -->
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header" style="font-size:22px; color: #5075e3">Customer Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('First', 'First:') }}
                        {{ html()->text('First_Name')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Last', 'Last:') }}
                        {{ html()->text('Last_Name')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Phone', 'Phone:') }}
                        {{ html()->text('Phone_Number')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Email', 'Email:') }}
                        {{ html()->text('email', '.com')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                    </h4>
                </div>
            </div>


<div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Vehicle Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('Year', 'Year:') }}
                        {{ html()->text('Vehicle_Year')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->div()->html(html()->label('Make', 'Make:') . '<br>') }}
                        {{ html()->select('Vehicle_Make', [
                            '' => 'None',
                            'Other' => 'Other',
                            'Acura' => 'Acura',
                            'Audi' => 'Audi',
                            'BMW' => 'BMW',
                            'Buick' => 'Buick',
                            'Cadillac' => 'Cadillac',
                            'Chevrolet' => 'Chevrolet',
                            'Chrysler' => 'Chrysler',
                            'Dodge' => 'Dodge',
                            'Ford' => 'Ford',
                            'GMC' => 'GMC',
                            'Honda' => 'Honda',
                            'Hyundai' => 'Hyundai',
                            'Infiniti' => 'Infiniti',
                            'Jeep' => 'Jeep',
                            'Kia' => 'Kia',
                            'Land Rover' => 'Land Rover',
                            'Lexus' => 'Lexus',
                            'Lincoln' => 'Lincoln',
                            'Mazda' => 'Mazda',
                            'Mercedes-Benz' => 'Mercedes-Benz',
                            'Mercury' => 'Mercury',
                            'Mini' => 'Mini',
                            'Mitsubishi' => 'Mitsubishi',
                            'Nissan' => 'Nissan',
                            'Oldsmobile' => 'Oldsmobile',
                            'Porsche' => 'Porsche',
                            'Pontiac' => 'Pontiac',
                            'Saab' => 'Saab',
                            'Saturn' => 'Saturn',
                            'Subaru' => 'Subaru',
                            'Suzuki' => 'Suzuki',
                            'Toyota' => 'Toyota',
                            'Volkswagen' => 'Volkswagen',
                            'Volvo' => 'Volvo',
                        ])->class('form-control')->style('width:220px; margin-left:15px; color:black;') }}
                        {{ html()->label('Model', 'Model:') }}
                        {{ html()->text('Vehicle_Model')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('VIN', 'VIN:') }}
                        {{ html()->text('VIN')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Address</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('Address', 'Address:') }}
                        {{ html()->text('address')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('City', 'City:') }}
                        {{ html()->text('city', 'Draper')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('State', 'State:') }}
                        {{ html()->text('state', 'Ut')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('zipcode', 'zipcode:') }}
                        {{ html()->text('zipcode', '84020')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}


                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Additional Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('Additional_Info', 'Customer Notes:') }}
                        {{ html()->textarea('Additional_note')->class('inwicustnote form-control')->attribute('size', '4x4') }}
                        {{ html()->submit('Submit Info')->class('btn btn-success btn-lg btn-block lnkveh')->style('margin-top: 20px;') }}

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-2">


        </div>
    </div>
</div>

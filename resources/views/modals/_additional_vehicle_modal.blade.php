<!-- Modal MyModal2 Form Adds New Vehicle -->
<button type="button" class="{{$classprop}}" data-toggle="modal" data-backdrop='false' data-target="#myModal3">
    Add Vehicle
</button>

<!-- Modal -->
<div id="myModal3" class="modal" tabindex="-1">
    <div>
        <form method="POST" action="{{ route('customer.newVehicle', $customer_info->id) }}">
            @csrf
            @method('PATCH')
            <!-- form fields here -->

            <div class="modal-body modal-body-custom">
                <div class="card-group">
                    <div class="modal-body">
                        <div class="row fullform">
                            <div class="card card-custom cardshadow">
                                <div class="card-header card-header-custom">Vehicle Info</div>
                                <div class="card-body">
                                    <h4 class="card-title card-title-custom">

                                    {{ html()->label('Year', 'Year:') }}
                                    {{ html()->text('Vehicle_Year')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                                    {{ html()->div()->html(html()->label('Make', 'Make:') . '<br>') }}
                                        {{ html()->select('Vehicle_Make', $vehicle_makes)
                     ->class('form-control')
                     ->style('width:220px; margin-left:15px; color:black;')
               }}
                                    {{ html()->label('Model', 'Model:') }}
                                    {{ html()->text('Vehicle_Model')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                                    {{ html()->label('VIN', 'VIN:') }}
                                    {{ html()->text('VIN')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                                    </h4>
                                </div>
                                <div class="card-footer card-footer-custom">
                                    <button type="button" class="btn btn-xs btn-block btn-warning" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>

                            <div class="card card-custom cardshadow">
                                <div class="card-header card-header-custom">Additional Info</div>
                                <div class="card-body">
                                    <h4 class="card-title card-title-custom">
                                    {{ html()->label('Additional_Info', 'Customer Notes:') }}
                                    {{ html()->textarea('Additional_note')->class('inwicustnote form-control')->attribute('size', '4x4') }}
                                    {{ html()->submit('Submit Info')->class('btn btn-success btn-lg btn-block lnkveh')->style('margin-top: 20px;') }}

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

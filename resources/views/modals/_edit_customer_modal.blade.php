<div id="editcustomer{{$customer_info->id}}" class="modal" tabindex="-2">

    {{ html()->model($customer_info)->form('PATCH', route('customer.editCustomer', $customer_info->id))->attribute('enctype', 'multipart/form-data')->open() }}
    {{ html()->hidden('_method', 'PATCH') }}

    <div class="modal-body">
        <div class="card-group">
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header" style="font-size:22px; color: #5075e3 ">Customer Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('First:')->for('First_Name') }}
                        {{ html()->text('First_Name')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Last:')->for('Last_Name') }}
                        {{ html()->text('Last_Name')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Phone:')->for('Phone_Number') }}
                        {{ html()->text('Phone_Number')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Email:')->for('email') }}
                        {{ html()->text('email')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                    </h4>
                </div>
            </div>

            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Address</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('Address:')->for('address') }}
                        {{ html()->text('address')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('City:')->for('city') }}
                        {{ html()->text('city')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('State:')->for('state') }}
                        {{ html()->text('state')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}
                        {{ html()->label('Zipcode:')->for('zipcode') }}
                        {{ html()->text('zipcode')->class('inwicust form-control')->style('width:220px; margin-left:15px;') }}

                    </h4>
                </div>
            </div>
            <div class="card cardshadow text-white bg-dark mb-3" style="max-width: 30rem; margin-left:15px;">
                <div class="card-header " style="font-size:22px; color: #5075e3 ">Additional Info</div>
                <div class="card-body">
                    <h4 class="card-title" style="color:orange;">
                        {{ html()->label('Customer Notes:')->for('Additional_note') }}
                        {{ html()->textarea('Additional_note')->class('inwicustnote form-control')->attribute('size', '4x4') }}
                        {{ html()->submit('Submit Info')->class('btn btn-success btn-lg btn-block lnkveh')->style('margin-top: 20px;') }}   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-sm-2">

            {{ html()->form()->close() }}
        </div>
    </div>
</div>

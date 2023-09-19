<div id="editcustomer{{$customer_info->id}}" class="modal" tabindex="-2">

    {!! Form::model($customer_info, ['route' => ['customer.editCustomer', $customer_info->id], 'files' => true])  !!}
    {!! Form::hidden('_method', 'PATCH') !!}

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
                        {{ Form::text('email', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
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
                        {{ Form::text('city', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('State', 'State:') }}
                        {{ Form::text('state', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}
                        {{ Form::label ('zipcode', 'zipcode:') }}
                        {{ Form::text('zipcode', null, ['class' => 'inwicust form-control', 'style' => 'width:220px; margin-left:15px;']) }}

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

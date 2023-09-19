@section
    <!-- Main Index Table -->


    <!--Alert panel where errors are displayed and also available resources on page -->
    @include('partials._alert_panel_home')
    <!-- end Alert Panel -->
    <div class="tableBanner" style="margin-bottom:0;">
        <div class="form-group btn-lg" style="margin-bottom:0;">
            <img src="/images/AdobeStock_124575043_logo.jpg" class="headimg" alt="car logo" height="67px" width="100px">
            <!-- Create Customer Info Button, Opens modal-->
            <a type="button" class="btn btn-lg  cust-btn" data-toggle="modal" data-target="#myModal">Create New Customer
                Info</a>
            <!-- Opens Modal with Form to Add a new customer Entry -->
            @include('modals._create_customer_modal')
        </div>
    </div>
    <!-- Admin view totals -->
    @include('components._data_view_totals')
    <div>
        @include('components.create_customer_component')
    </div>
    <div class="table-col-links col-sm-10">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Customer</th>
                <th>Phone Number</th>
                <th>Vehicle</th>
                <th>Vehicle VIN</th>
                <th>Check Out</th>
                <th>Created By</th>
            </tr>
            </thead>
            <!-- Index of Currently checked in customers -->
            <tbody>
            @foreach($customer_info as $customer_info)
                <tr class="tb-row">
                    <!-- Customer Information -->
                    <td>
                        {{ $customer_info->id }}
                    </td>
                    <td class="cust-name">
                        <a href="{{ route('customer.show', $customer_info->id) }}">
                            {!! ucfirst($customer_info['Last_Name']) !!} , {!! ucwords($customer_info['First_Name']) !!}
                        </a>
                    </td>
                    <td>
                        {!! $customer_info['Phone_Number'] !!}
                    </td>
                    <!-- End Customer Info -->
                    <!-- Vehicle Info -->
                    <!-- Modal for adding new vehicle, creates new customer entry with same customer information -->
                    <td>
                        <a type="button" class="btn btn-success btn-xs lnkveh"
                           data-toggle="modal" data-target="#myModal2{{$customer_info->id}}">New
                        </a>

                        @include('modals._new_vehicle_modal')
                        &nbsp;&nbsp;{!! ucwords($customer_info['Vehicle_Year']) !!} {!! ucwords($customer_info['Vehicle_Make']) !!} {!! ucwords($customer_info['Vehicle_Model']) !!}
                    </td>
                    <!-- End Modal for adding new vehicle, creates new customer entry with same customer information -->
                    <!-- If customer VIN is not entered will open input in its place -->
                @include('components._vin_input')
                <!-- end Vehicle Info -->
                    <td>

                        {!! Form::model($customer_info, ['route' => ['customer.checkOut', $customer_info->id]])  !!}
                        {!! Form::hidden('_method', 'PATCH') !!}
                        {{ Form::submit ('Check Out', ['class' => 'btn btn-primary  btn-xs chk-btn']) }}
                        {!! Form::close() !!}
                    </td>

                    <td>
                        {{ ltrim($customer_info->user_id, "User:") }}
                    </td>

                </tr>
            @endforeach
            </tbody>
            <!-- End Index of Currently checked in customers -->
        </table>
    </div>
    <!-- End Main Index Table -->
@endsection




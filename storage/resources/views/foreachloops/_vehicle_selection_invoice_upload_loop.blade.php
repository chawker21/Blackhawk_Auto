@foreach($customer_info->customer_vehicles as $vehicle)
    @include('modals._invoice_upload_modal')
    <br>
@endforeach

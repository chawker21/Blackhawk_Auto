<!-- Loop through each customer info and display it within a Bootstrap card -->
@foreach($customer_infos as $customer_info)
    <!-- Using Bootstrap combined with custom styles -->
    <div class="card bg-dark text-white mb-3 customer-card">
        <!-- Card Header -->
        <div class="card-header">
            <!-- Link to the customer detail page -->
            <a href="{{ route('pages.show', $customer_info->id) }}" class="text-white">
                <!-- Format the customer's name -->
                {!! ucwords($customer_info['First_Name']) !!} {!! ucfirst($customer_info['Last_Name']) !!}
            </a>
            <!-- Show index number on the right -->
            <span class="index-number">{{ $loop->index+1 }}</span>
            <!-- Display the customer's phone number -->
            <p class="phone-number">{{$customer_info->Phone_Number}}</p>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <!-- Include the nested loop for vehicle info -->
            @include('foreachloops._customer_main_card_vehicle_loop')
        </div>

        <!-- Horizontal line -->
        <hr>

        <!-- Card Footer -->
        <div class="card-footer">
            <!-- Include the done button -->
            @include('forms._customer_done_button')
        </div>
    </div>
@endforeach

<!-- Pagination links -->
<div class="col-12">
    {{ $customer_infos->links() }}
</div>

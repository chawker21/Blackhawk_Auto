<div class="card text-white bg-dark mb-3 card-col-90 cardshadow cardprop" >
    <div class="card-header">
        <h4 class="cardheader">
            {{ ucfirst($customer_info->First_Name)}}'s vehicles:
            <!-- Modal for adding new vehicle, creates new customer entry with same customer information -->

            @include("modals._additional_vehicle_modal", ["classprop" => "flo-r btn btn-primary btn-md lnkvehprim"])

        </h4>
    </div>
    <div class="card-body">
        <h3 class="cardsubheader">
            Vehicles:<span class="flo-r">{{$customer_info->customer_vehicles->count()}}</span>
        </h3>
        <hr class="carddot">
        @foreach($customer_vehicle as $vehicle)

            @include('components._vehicle_block', ['CheckOut' => null])
        @endforeach

    </div>
</div>

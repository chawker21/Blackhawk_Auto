<div class="card text-white bg-dark mb-3 cardshadow cardprop card-col-90" >
    <div class="card-header">
        <h4 class="cardheader">
            Customer Info: {{$customer_info->id }}
            <button type="button" class="btn btn-primary btn-md lnkvehprim flo-r"
                    data-toggle="modal" data-backdrop='false' data-target="#editcustomer{{$customer_info->id}}">Edit
            </button>
            @include('modals._edit_customer_modal')
        </h4>
    </div>
    <div class="card-body">
        <h3 class="cardsubheader">
            {!! ucfirst($customer_info['First_Name']) !!} {!! ucfirst($customer_info['Last_Name']) !!}
            <span class="flo-r">
            {!! $customer_info['Phone_Number'] !!}
            </span>
        </h3>
        <h4>{!! $customer_info->email !!}<br>
        {!! ucfirst($customer_info->address) !!} {!! ucfirst($customer_info->city) !!} {!! ucfirst($customer_info->state) !!}
            , {!! ucfirst($customer_info->zipcode) !!}</h4>
        <hr class="carddot">
        <h3 class="cardsubheader">
            Vehicles currently checked in:<span class="flo-r">{{$current_vehicle->count()}}</span>
        </h3>
        <hr class="carddash">
        @foreach($current_vehicle as $vehicle)
            @include('components._vehicle_block', ['CheckOut' => 'Check Out'])
        @endforeach
    </div>
    <div class="card-footer">
        <a type="button" class="btn btn-success btn-block lnkveh"
           href="{{ route('pages.homepage') }}">Home</a>
    </div>
</div>
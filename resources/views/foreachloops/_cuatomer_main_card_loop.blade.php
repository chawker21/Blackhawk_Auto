@foreach($customer_infos as $customer_info)
    <div class="card text-white bg-dark cardshadow customer-card-prop">
        <div class="card-header lnkvehprim f-16">
            <a href="{{ route('pages.show', $customer_info->id) }}"> {!! ucwords($customer_info['First_Name']) !!} {!! ucfirst($customer_info['Last_Name']) !!}</a>
            <span class="flo-r">{{ $loop->index+1 }}</span>
            <p class="m-0p orange">{{$customer_info->Phone_Number}}</p>
        </div>

        <div class="card-body">
            @include('foreachloops._customer_main_card_vehicle_loop')
        </div>
        <hr class="cardshadow">
        <div class="card-footer">
            @include('forms._customer_done_button')
        </div>
    </div>
@endforeach
<div class="col-xs-12">
    {{ $customer_infos->links() }}
</div>


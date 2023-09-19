<div>

    <div class="card-header lnkvehprim" style="font-size:16px;">
        <a href="{{ route('pages.show', $customer_info->id) }}"> {!! ucwords($customer_info['First_Name']) !!} {!! ucfirst($customer_info['Last_Name']) !!}</a>


        <span style="float:right">{{ $loop->index+1 }}</span>

        <h3 class="card-title"
            style="color:orange; margin:0 0 0 0; font-size:14px;">{{$customer_info->Phone_Number}}</h3></div>

</div>
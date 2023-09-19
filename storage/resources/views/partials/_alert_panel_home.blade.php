@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif
@if (Session::has('success'))
    <h5 class="alert alert-success" role="alert">
        <Strong>Success:</Strong> {{ Session::get('success') }}
    </h5>

@endif

    @foreach($SMSbody as $SMSinfo)
        <div class="card text-white cardshadow mb-3 bg-cust" style="margin-left:5px; font-size:10px; float:left; width:16%;">
            <div class="card-header">{{mb_strimwidth($SMSinfo['Body'], 18, 33)}}</div>
            <div class="card-body">
                {{mb_strimwidth($SMSinfo['Body'], 0, 16)}}
            </div>
        </div>
    @endforeach


<!-- Sidebar for text info sent to site -->
<aside style="margin-top:200px;">
    @foreach($SMSbody as $SMSinfo)
        <div class="card text-white cardshadow mb-3 bg-cust" style="width:70%;">
            <div class="card-header">{{mb_strimwidth($SMSinfo['Body'], 18, 33)}}</div>
            <div class="card-body">
                {{mb_strimwidth($SMSinfo['Body'], 0, 16)}}
            </div>
        </div>
    @endforeach
</aside>



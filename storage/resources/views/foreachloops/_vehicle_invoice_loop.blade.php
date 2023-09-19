@if ( $invoice->type === 'Invoice' || 'invoice' )

    <ul class="invdeco">
        <li>

            <a type="button" class="{{$classprop}}" style="{{$float}}"
               href="https://s3-us-west-2.amazonaws.com/chawker21/{{ $invoice->invoice_name }}" target="_blank">
                {{$addcheck}}
                <span>Invoice</span><span style="float:right;">${{$invoice->invoice_total}}</span></a>
        </li>
    </ul>

@endif


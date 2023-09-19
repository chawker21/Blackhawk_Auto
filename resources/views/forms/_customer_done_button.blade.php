

<button type="button" class="btn btn-success btn-xs " style="float:left;" data-toggle="modal" data-backdrop='false'
              data-target="#vehicleselectInvoice{{$customer_info->id}}">
    Invoice +
</button>
<div id="vehicleselectInvoice{{$customer_info->id}}" class="modal" tabindex="-1">
    @include('components._vehicle_selection_modal', ['forloop' => 'foreachloops._vehicle_selection_invoice_upload_loop'])

</div>



@current($customer_info)

{{ html()->form('PATCH', route('customer.done', $customer_info->id))->open() }}

{{ html()->hidden('_method')->value('PATCH') }}

{{ html()->button('Check Out')->class('btn btn-info btn-xs chk-btn')->style('margin-left:15px; margin-top:-2px; float:right;')->type('submit') }}

{{ html()->form()->close() }}
@else
    {{ html()->form('PATCH', route('customer.done', $customer_info->id))->open() }}

    {{ html()->hidden('_method')->value('PATCH') }}

    {{ html()->button('Check In')->class('btn btn-info btn-xs chk-btn')->style('margin-left:15px; margin-top:-2px; float:right;')->type('submit') }}

    {{ html()->form()->close() }}


    @endcurrent





    {{--@if($customer_info->customer_vehicles->count() > 1)--}}
    {{--@include('modals._check_customer_in_with_vehicle_selection', ["float" => "float:right;", 'addcheck' => 'Check In', "classprop" => "btn btn-info  btn-xs chk-btn"])--}}
    {{--@elseif($customer_info->customer_vehicles->count() == 1)--}}
    {{--@include('modals._add_vehicle_single_note', ["float" => "float:left;", 'addcheck' => 'Add Note', "classprop" => "btn btn-info  btn-xs chk-btn"])--}}
    {{--@else--}}
    {{--@include('modals._additional_vehicle_modal', ["float" => "float:left;", "classprop" => "btn btn-info  btn-xs chk-btn"])--}}
    {{--@endif--}}


    {{--{!! Form::model($customer_info, ['route' => ['customer.done', $customer_info->id]])  !!}--}}
    {{--{!! Form::hidden('_method', 'PATCH') !!}--}}
    {{--{{ Form::submit ('Check In', ['class' => "btn btn-primary  btn-xs chk-btn ", 'style' => " float:right; " ]) }}--}}
    {{--{!! Form::close() !!}--}}

    {{--@if($customer_info->customer_vehicles->count() > 1)--}}
    {{--@include('modals._vehicle_selection_checked_in', ["float" => "float:right;", 'addcheck' => 'Check Out', "classprop" => "btn btn-info  btn-xs chk-btn"])--}}
    {{--@elseif($customer_info->customer_vehicles->count() === 1)--}}
    {{--@include('modals._add_vehicle_single_note', ["float" => "float:right;", 'addcheck' => 'Check Out', "classprop" => "btn btn-info  btn-xs chk-btn"])--}}
    {{--@endif--}}





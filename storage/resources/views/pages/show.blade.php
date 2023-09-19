@extends('layouts.app')


@section('title', '| View Customer Info')

@section('content')

    <div class="post col-xs-12">

        <div class="col-xs-12 col-lg-6 col-xl-3">
            @include('partials.show_page_cards._customer_card')
        </div>
        <div class="col-xs-12 col-lg-6 col-xl-3">
            @include('partials.show_page_cards._vehicle_card')
        </div>
        <div class="col-xs-12 col-lg-6 col-xl-3">
            @include('partials.show_page_cards._note_card')
        </div>
        <div class="col-xs-12 col-lg-6 col-xl-3">
            @include('partials.show_page_cards._invoice_card')
        </div>
        {{--<div class="col-lg-6">--}}
            {{--@include('components._aws_bucket_data_carousel')--}}
        {{--</div>--}}
    </div>

    {{--<div class="post col-xs-12">--}}
        {{--<div class="col-xs-12 col-xl-6">--}}
            {{--@include('partials.show_page_cards._invoice_display_card')--}}
        {{--</div>--}}
        {{--<div class="col-xs-12 col-xl-6">--}}
            {{--@include('partials.show_page_cards._data_display_card')--}}
        {{--</div>--}}


        <div class="post col-md-12">
            <div style="text-align:center; margin-top:50px;">
                <img src="/images/AdobeStock_112735050resize.jpg" class="footimg" height=225px width=300px>
            </div>
        </div>
    </div>

    @if (Auth::user()->name == 'User: Chris Hawker')
        <div class="col-sm-1" style="float:right; margin-right:40px; ">
            {!! Form::open(['route' => ['customer.destroy', $customer_info->id]]) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Delete Customer Info', ['class' => "btn btn-danger btn-md lnkdest"]) !!}
            {!! Form::close() !!}
        </div>
    @endif
    <!-- End Invoice Section, Displays bucket invoices for customer -->
@endsection

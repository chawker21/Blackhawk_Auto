@extends('layouts.app')


@section('title', '| Customer Info')

@section('content')
    <div class="col-xs-12">

        <div id="NewCustomerButton" style="margin-left:50px; float:left;">
            @include('components.create_customer_component')
        </div>
        <div id=AlertPanel class="alert alert-primary"
             style="width:50%; text-align:center; height:100px; margin: 0 auto 20px 400px;" role="alert">
            @include('partials._alert_panel_home')
        </div>
        <div style="margin-left:400px;">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd5ba84nBYBNFrX3exVFTIem9oK625ZX2zWPiWStwRb3f-kEQ/viewform?embedded=true" width="400" height="200" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

            @include('modals._create_customer_modal')
        </div>
        <div id="CustomerCard" style="clear:both;">
            @include('foreachloops._cuatomer_main_card_loop', ['current' => 1, 'dispnone' => '', 'chadnote' => 'Add Note'])
        </div>

    </div>


@endsection
@extends('layouts.app')


@section('title', '| Customer Info')

@section('content')


    @include('foreachloops._cuatomer_main_card_loop', ['current' => 0, 'dispnone' => 'display:none;', 'chadnote' => 'Add Note'])



@endsection
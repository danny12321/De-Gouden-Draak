@extends('layouts.cashdesk')

@section('content')
    @include('inc.cashdesknav')
    <cashdesk menuitems="{{json_encode($menuitems)}}"></cashdesk>
@endsection

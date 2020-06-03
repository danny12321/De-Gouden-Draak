@extends('layouts.cashdesk')

@section('content')
    @include('inc.cashdesknav')
    <cashdesk :tables="{{json_encode($tables)}}" menuitems="{{json_encode($menuitems)}}"></cashdesk>
@endsection

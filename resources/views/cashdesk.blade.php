@extends('layouts.cashdesk')

@section('content')
    <cashdesk :tables="{{json_encode($tables)}}" menuitems="{{json_encode($menuitems)}}"></cashdesk>
@endsection

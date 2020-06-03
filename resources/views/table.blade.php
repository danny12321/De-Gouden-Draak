@extends('layouts.cashdesk')

@section('content')
    @include('inc.cashdesknav')
    <tables :tablesprops="{{json_encode($tables)}}"></tables>
@endsection

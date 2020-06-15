@extends('layouts.cashdesk')

@section('content')
    <tables :tablesprops="{{json_encode($tables)}}"></tables>
@endsection

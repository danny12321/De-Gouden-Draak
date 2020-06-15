@extends('layouts.tablet')

@section('content')
    <form method="POST" action="{{ route('guest_store_tablet', ['table' => $table]) }}">
        @csrf
        @method('POST')

        <input type="submit" value="Nieuwe gasten">
    </form>
    <tablet-component menuitems="{{json_encode($menuitems)}}" table="{{$table}}"/>
@endsection

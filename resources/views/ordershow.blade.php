@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Bedankt voor uw bestelling!</h1>
    <div>Ordernummer <b>{{$order->id}}</b></div>
    <div>Naam <b>{{$order->guest->name}}</b></div>

    <takeoutorderqr orderprops="{{$order}}" orderlinesprops="{{$order->orderline}}" guestprops="{{$order->guest}}"></takeoutorderqr>

</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="l-sales">

        @foreach ($sales as $sale)
            <div class="m-paper l-sales__sale">
                <h1>{{ $sale->Menuitem->name }}</h1>
                <div>{{ $sale->Menuitem->description }}</div>

                <div>{{$sale->description}}</div>
                <h2>Prijs: <s>&euro;{{ $sale->Menuitem->price }}</s> - &euro;{{ $sale->new_price }}</h2>
            </div>
        @endforeach
    </div>
@endsection

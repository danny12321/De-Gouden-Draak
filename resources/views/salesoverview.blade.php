@extends('layouts.cashdesk')

@section('content')
    <div class="l-salesoverview container">
        <h1>Verkoop overzicht</h1>

        <div class="l-salesoverview__sales">

            @foreach ($sales as $sale)
                <div class="l-salesoverview__sales__sale">
                    <div class="l-salesoverview__sales__sale__head">
                        <span class="l-salesoverview__sales__sale__head__id">{{$sale->id}}</span>
                        <span class="l-salesoverview__sales__sale__head__name">{{$sale->guest->name}}</span>
                        <span class="l-salesoverview__sales__sale__head__date">{{$sale->guest->created_at}}</span>
                    </div>

                    @if ($sale->guest->table)
                    <div>
                        Tafel: <b>{{$sale->guest->table->id}}</b>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Gerecht</th>
                                    <th>Aantal</th>
                                    <th>Beschrijving</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sale->orderlines as $item)
                                <tr>
                                    <td>{{$item->menuitem->menunumber}}</td>
                                    <td>{{$item->menuitem->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->desciption}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

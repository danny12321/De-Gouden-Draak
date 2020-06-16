@extends('layouts.cashdesk')

@section('content')
    <div class="container">
        <h1>Gerechten</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Specialiteit</th>
                        <th>Naam</th>
                        <th>Type</th>
                        <th>Beschrijving</th>
                        <th>Prijs</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($menuitems as $item)
                        <tr>
                            <td>{{ $item->menunumber }}</td>
                            <td>
                                @if ($item->specialty)
                                <i class="fas fa-bacon"></i>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->MenuitemType->type }}</td>
                            <td>{{ $item->description }}</td>
                            <td>€{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

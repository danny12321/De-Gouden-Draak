@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Gerechten</h1>
        <a href="{{ route('admin.dishes.create') }}">Voeg menu item toe</a>
        
        <table>
            <tr>
                <th>Nummer</th>
                <th>Naam</th>
                <th></th>
            </tr>
        
            @foreach ($menuitems as $item)
                <tr>
                    <td>{{ $item->menunumber }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{route('admin.dishes.edit', ['menuitem' => $item->id])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
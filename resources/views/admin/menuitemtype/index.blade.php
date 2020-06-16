@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Categorieën</h1>
        <a href="{{ route('admin.menuitemtype.create') }}">Voeg menu item toe</a>
        
        <table>
            <tr>
                <th>Naam</th>
                <th></th>
            </tr>
        
            @foreach ($menuitemtypes as $item)
                <tr>
                    <td>{{ $item->type }}</td>
                    <td>
                        <a href="{{route('admin.menuitemtype.edit', ['menuitemtype' => $item->id])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Wijzig {{$menuitemtype->type}}</h1>

        <form method="post" action="{{ route('admin.menuitemtype.update', ['menuitemtype' => $menuitemtype->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="type">Menunummer</label>
                <input class="form-control @error('type') is-invalid @enderror" value="{{ old('type', $menuitemtype->type) }}" type="text" name="type" id="type">
                
                @error('type')
                <div class="invalid-feedback">
                    {{ $errors->first("type") }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form"><i class="fas fa-trash-alt"></i></button>
            </div>
        </form>

        <form action="{{ route('admin.menuitemtype.delete', ['menuitemtype' => $menuitemtype->id]) }}" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
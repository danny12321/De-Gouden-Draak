@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Menu categorie toevoegen</h1>

        <form method="post" action="{{ route('admin.menuitemtype.store') }}">
            @csrf

            <div class="form-group">
                <label for="type">Naam</label>
                <input class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" type="text" name="type" id="type">
                
                @error('type')
                <div class="invalid-feedback">
                    {{ $errors->first("type") }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </form>
    </div>
@endsection
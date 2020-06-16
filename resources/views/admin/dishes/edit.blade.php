@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Wijzig {{$item->name}}</h1>

        <form method="post" action="{{ route('admin.dishes.update', ['menuitem' => $item->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="menunumber">Menunummer</label>
                <input class="form-control @error('menunumber') is-invalid @enderror" value="{{ old('menunumber', $item->menunumber) }}" type="text" name="menunumber" id="menunumber">
                
                @error('menunumber')
                <div class="invalid-feedback">
                    {{ $errors->first("menunumber") }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Naam</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}" type="text" name="name" id="name">
                
                @error('name')
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', $item->description) }}</textarea>
                
                @error('description')
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prijs</label>
                <input class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $item->price) }}" type="number" step="0.01" name="price" id="price">
                
                @error('price')
                <div class="invalid-feedback">
                    {{ $errors->first("price") }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="menuitem_type">Type</label>

                <select class="form-control @error('menuitem_type_id') is-invalid @enderror" name="menuitem_type_id" id="menuitem_type_id">
                    @foreach ($item_types as $type)
                        <option 
                            value="{{$type->id}}"
                            @if(old('menuitem_type_id', $item->menuitem_type_id) == $type->id) selected @endif
                        >{{$type->type}}</option>
                    @endforeach
                </select>
                
                @error('menuitem_type')
                <div class="invalid-feedback">
                    {{ $errors->first("menuitem_type") }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input class="@error('specialty') is-invalid @enderror" @if(old('specialty', $item->specialty) == true) checked @endif type="checkbox" name="specialty" id="specialty">
                <label for="specialty">Specialiteit</label>
                
                @error('specialty')
                    <div class="invalid-feedback">
                        {{ $errors->first("specialty") }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form"><i class="fas fa-trash-alt"></i></button>
            </div>
        </form>

        <form action="{{ route('admin.dishes.delete', ['menuitem' => $item->id]) }}" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
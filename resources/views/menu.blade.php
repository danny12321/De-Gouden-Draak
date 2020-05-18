@extends('layouts.app')

@section('content')
    <div class="l-menu m-paper">

        @foreach ($menuitems as $key => $item)
            @if ($key == 0 || $menuitems[$key -1]->MenuitemType->id != $item->MenuitemType->id)
                </ul>
                <h1 class="l-menu__group__type">{{$item->MenuitemType->type}}</h1>
                <ul class="l-menu__group">
            @endif
                
            <li class="l-menu__group__item">
                <span class="l-menu__group__item__name">{{ $item->menunumber }}. {{$item->name}}</span> <span class="l-menu__group__item__price">&euro; {{$item->price}}</span>
            </li>
        @endforeach

        </ul>    

    </div>
@endsection
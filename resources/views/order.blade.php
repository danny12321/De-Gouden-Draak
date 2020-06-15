@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order</h1>
    
    <takeoutorder menuitems="{{json_encode($menuitems)}}"></takeoutorder>
</div>
@endsection

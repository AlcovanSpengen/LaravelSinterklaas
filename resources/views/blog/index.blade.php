@extends('main')

@section('content')
    @foreach ($wishlists as $wishlist)
        {{ $wishlist->title }}
        {{ $wishlist->product1 }}
        {{ $wishlist->product2 }}
        {{ $wishlist->product3 }}
        {{ $wishlist->product4 }}
        {{ $wishlist->product5 }}
        <br>
        @endforeach
@endsection
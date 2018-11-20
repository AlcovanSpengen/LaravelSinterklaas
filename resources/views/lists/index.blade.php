@extends('main')

@section('content')
    <h1>Deel hier jouw verlanglijstje!</h1>
    <div class="verlanglijstje">
    </div>


    @if (Auth::user()->wishlist->count() )
    @foreach ($wishlists as $wishlist)
    {{ $wishlist->title }}
    {{ $wishlist->product1 }}
    {{ $wishlist->product2 }}
    {{ $wishlist->product3 }}
    {{ $wishlist->product4 }}
    {{ $wishlist->product5 }}
    {{ $wishlist->user_id }}
    <br>
    @endforeach
    @endif  
@endsection
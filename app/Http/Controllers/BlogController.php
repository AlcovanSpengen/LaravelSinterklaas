<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;

class BlogController extends Controller
{
    public function getIndex() 
    {
        $wishlists = Wishlist::paginate(10);

        return view('blog.index')->withWishlists($wishlists);
    }
}

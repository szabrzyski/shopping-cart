<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function index(Request $request)
    {
        return view('shoppingCart');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{

    // Test method
    public function test(Request $request)
    {
        session()->forget('shoppingCartProducts');
        if ($request->session()->has('shoppingCartProducts')) {
            dd(session('shoppingCartProducts', '0'));
        }
        return back();

    }

}

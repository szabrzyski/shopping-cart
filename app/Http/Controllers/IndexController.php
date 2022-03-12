<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::paginate(3)->appends(request()->except('page'));

        return view('index')->with('results', $products);
        
    }

}

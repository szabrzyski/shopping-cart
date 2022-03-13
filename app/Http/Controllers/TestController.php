<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{

    // Test method
    public function test(Request $request)
    {
        return back();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{

    // List products using pagination (max 3 per page)
    public function index(Request $request)
    {
        $products = Product::paginate(3)->appends(request()->except('page'));

        // Redirect to previous page after deleting last product on the current page
        if ($request->page > 1 && $products->isEmpty()) {
            $page = $request->page - 1;
            return redirect(route(Route::currentRouteName(), ['page' => $page]))->with([
                'success' => 'Product has been removed from the catalog',
            ]);
        }

        $productIdsInShoppingCart = session('shoppingCartProducts', []);

        return view('index')->with('results', $products)->with('productIdsInShoppingCart', $productIdsInShoppingCart);

    }

    /**
     * Delete product from catalog
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\Product $product
     */
    public function deleteProduct(Request $request, Product $product)
    {

        if ($product->delete()) {

            $productIdsInShoppingCart = session()->get('shoppingCartProducts');

            $productIdKeys = array_keys($productIdsInShoppingCart, $product->id);

            if (!empty($productIdKeys)) {
                unset($productIdsInShoppingCart[$productIdKeys[0]]);
                session()->put('shoppingCartProducts', $productIdsInShoppingCart);
            }

            return back()->with([
                'success' => 'Product has been removed from the catalog',
            ]);
        } else {
            return back()->with([
                'error' => 'An error occurred while removing the product',
            ]);
        }

    }

}

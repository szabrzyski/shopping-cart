<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function index(Request $request)
    {
        $productIdsInShoppingCart = session('shoppingCartProducts', []);
        $productsInShoppingCart = Product::whereIn('id', $productIdsInShoppingCart)->get();
        return view('shoppingCart')->with('productIdsInShoppingCart', $productIdsInShoppingCart)->with('productsInShoppingCart', $productsInShoppingCart);
    }

    /**
     * Add product to shopping cart
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\Product $product
     */
    public function addProduct(Request $request, Product $product)
    {

        $productIdsInShoppingCart = session('shoppingCartProducts', []);

        if (in_array($product->id, $productIdsInShoppingCart)) {
            return back()->with([
                'error' => 'Product is already in the cart',
            ]);
        } elseif (count($productIdsInShoppingCart) > 2) {
            return back()->with([
                'error' => 'You can have up to 3 products in your cart',
            ]);
        } else {
            session()->push('shoppingCartProducts', $product->id);
            return back()->with([
                'success' => 'Product has been added to the cart',
            ]);
        }

    }

    /**
     * Delete product from shopping cart
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\Product $product
     */
    public function deleteProduct(Request $request, Product $product)
    {
        if (session()->has('shoppingCartProducts')) {

            $productIdsInShoppingCart = session()->get('shoppingCartProducts');

            $productIdKeys = array_keys($productIdsInShoppingCart, $product->id);

            if (!empty($productIdKeys)) {
                unset($productIdsInShoppingCart[$productIdKeys[0]]);
                session()->put('shoppingCartProducts', $productIdsInShoppingCart);

                return back()->with([
                    'success' => 'Product has been removed from the cart',
                ]);
            } else {
                return back()->with([
                    'error' => "There's no such product in your cart",
                ]);
            }

        } else {
            return back()->with([
                'error' => 'Your card is empty',
            ]);
        }

    }

}

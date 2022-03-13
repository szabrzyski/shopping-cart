<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

        return view('products.index')->with('results', $products);

    }

    // Add product to catalog (the form)
    public function addProduct(Request $request)
    {

        return view('products.add');
    }

    // Save product in catalog
    public function saveProduct(Request $request)
    {
        $walidator = Validator::make($request->all(), [
            'name' => 'required|string|unique:products,name',
            'price' => 'required|numeric|min:0.01',
        ]);

        if ($walidator->fails()) {

            return back()->withErrors($walidator)
                ->withInput();

        }

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;

        if ($newProduct->save()) {
            return redirect(route('mainPage'))->with([
                'success' => 'Product has been added to the catalog',
            ]);
        } else {
            return back()->withInput()->with([
                'error' => 'An error occurred while adding product to the catalog',
            ]);
        }
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

    /**
     * Edit product in catalog (the form)
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\Product $product
     */
    public function editProduct(Request $request, Product $product)
    {
        return view('products.edit')->with('product', $product);

    }

    /**
     * Update product in catalog
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Http\Product $product
     */
    public function updateProduct(Request $request, Product $product)
    {
        $walidator = Validator::make($request->all(), [
            'name' => 'required|string|unique:products,name,' . $product->id,
            'price' => 'required|numeric|min:0.01',
        ]);

        if ($walidator->fails()) {

            return back()->withErrors($walidator)
                ->withInput();

        }

        $product->name = $request->name;
        $product->price = $request->price;

        if ($product->save()) {
            return redirect(route('mainPage'))->with([
                'success' => 'Product has been updated',
            ]);
        } else {
            return back()->withInput()->with([
                'error' => 'An error occurred while updating product',
            ]);
        }
    }

}

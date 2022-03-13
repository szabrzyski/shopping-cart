<?php

namespace App\View\Composers;

use Illuminate\View\View;

class MultiComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
     
        $productIdsInShoppingCart = session('shoppingCartProducts', []);
        $view->with('productIdsInShoppingCart', $productIdsInShoppingCart);
    }
}

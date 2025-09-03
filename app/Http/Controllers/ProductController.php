<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class ProductController
{
    public function getCatalog()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $userId = Auth::id();
        $products = Product::all();

        $newProducts = [];

        foreach ($products as $product){
            $userProduct = UserProduct::query()->where('user_id', $userId)
                                               ->where('product_id', $product->id)
                                               ->first();

            if(!$userProduct){
                $userProduct = new UserProduct();
                $userProduct->amount = 0;
            }

            $product->user_product = $userProduct;

            $newProducts[] = $product;
        }


        return view('catalog', compact('newProducts'));
    }
}

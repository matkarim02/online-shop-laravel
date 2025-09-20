<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddReviewRequest;
use App\Http\Requests\GetProductRequest;
use App\Models\Product;
use App\Models\Review;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class ProductController
{
    public function getCatalog()
    {
        $user = Auth::user();

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

    public function getProduct(GetProductRequest $request)
    {
        $user = Auth::user();

        $productId = $request->validated()['product_id'];

        $product = Product::query()->find($productId);

        $product_reviews = Review::query()->with('product')
                                        ->where('product_id', $productId)
                                        ->get();

        $avgRating = $product_reviews->avg('rating');


        return view('product_review', compact('product_reviews', 'avgRating', 'product'));

    }




    public function addReview(AddReviewRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        Review::query()->create([
            'product_id' => $data['product_id'],
            'author' => $data['author'],
            'text' => $data['text'],
            'rating' => $data['rating'],
        ]);

        $productId = $request->validated()['product_id'];

        $product = Product::query()->find($productId);

        $product_reviews = Review::query()->with('product')
            ->where('product_id', $productId)
            ->get();

        $avgRating = $product_reviews->avg('rating');

        return view('product_review', compact('product_reviews', 'avgRating', 'product'));


    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecreaseProductRequest;
use App\Http\Requests\IncreaseProductRequest;
use App\Models\UserProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController
{
    public function getCart()
    {
        $user = Auth::user();

        $userProducts = $user->userProducts()->with('product')->get();

        if($userProducts->isEmpty()){
            return redirect('/catalog')->with('message', 'Ваша корзина пуста.');
        }

        $total = 0;
        foreach ($userProducts as $userProduct){
            $total += $userProduct->product->price * $userProduct->amount;
        }

        return view('cart', compact('userProducts', 'total'));

    }


    public function increaseProduct(IncreaseProductRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $userProduct = UserProduct::query()->where('user_id', $user->id)
                                            ->where('product_id', $data['product_id'])
                                            ->first();

        if($userProduct){
            $userProduct->amount += $data['amount'];
            $userProduct->save();
        } else {
            $userProduct = UserProduct::query()->create([
                'user_id' => $user->id,
                'product_id' => $data['product_id'],
                'amount' => $data['amount'],
            ]);
        }

        return response()->json([
            'amount' => $userProduct->amount
        ]);
    }




    public function decreaseProduct(DecreaseProductRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $userProduct = UserProduct::query()->where('user_id', $user->id)
                                            ->where('product_id', $data['product_id'])
                                            ->first();

        if(!$userProduct) {
            return response()->json(['amount' => 0]);
        }


        if($userProduct->amount <= 1) {
            UserProduct::query()->where('user_id', $user->id)
                                ->where('product_id', $data['product_id'])->delete();
            return response()->json(['amount' => 0]);
        }


        // Уменьшаем количество и сохраняем
        $userProduct->amount -= $data['amount'];
        if ($userProduct->amount < 0) {
            $userProduct->amount = 0; // защита от отрицательных значений
        }
        $userProduct->save();


        return response()->json([
            'amount' => $userProduct->amount
        ]);



    }
}

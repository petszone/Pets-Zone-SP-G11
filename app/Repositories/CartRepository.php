<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use App\Models\Product;

class CartRepository implements CartRepositoryInterface
{
    public function getUserCartProducts($userId)
    {
        return Cart::with('user', 'product.media')->where('user_id', $userId)->orderBy('id', 'DESC')->get();
    }

    public function addProduct($productId, $qnty, $userId)
    {
        $product = Product::find($productId);
        $cart = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        if($cart){
            $quntity = $cart->quantity + $qnty;
            $this->updateProductQuantity($cart->product_id, $quntity , $userId);
        }else{
            Cart::create([
                'user_id'    => $userId,
                'product_id' => $productId,
                'quantity'   => $qnty,
                'price'      => $product->price,
            ]);
        }

        return 'success';
    }

    public function updateProductQuantity($productId, $qnty, $userId)
    {
        $cart = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        $cart->update([
            'quantity'  => $qnty,
        ]);

        return 'success';
    }

    public function deleteProduct($productId, $userId)
    {
        $cart = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        Cart::destroy($cart->id);
        return 'success';
    }
}

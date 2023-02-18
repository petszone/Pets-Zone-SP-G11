<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders()
    {
        return Order::orderBy('id', 'DESC')->get();
    }

    public function getOrderById($orderId)
    {
        return Order::findOrFail($orderId);
    }

    public function getOrderProductsById($orderId)
    {
        $order = Order::with('orderProduct.product.media')->find($orderId);
        return $order;
    }

    public function getOrderByUserId($userId)
    {
        return Order::where('user_id', $userId)->get();
    }

    public function deleteOrder($orderId)
    {
        // Order::destroy($orderId);
    }

    public function createOrder(array $orderDetails)
    {
        $userId = auth()->user()->id;
        $total = 0;
        $cartProducts = Cart::where('user_id', $userId)->get();

        foreach($cartProducts as $item){
            $total +=  $item->price * $item->quantity;
        }
        DB::transaction(function () use($userId, $total, $cartProducts, $orderDetails, &$order ) {
            $order = Order::create([
                'user_id' => $userId,
                'statuspayment' => 'Pending',
                'total' => $total,
            ]);

            foreach($cartProducts as $item){
                OrderProduct::create([
                    'user_id'    => $userId,
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->price,
                    'statuspayment' => 2,
                ]);
                $cart = Cart::where('user_id', $userId)->where('product_id', $item->product_id)->first();
                Cart::destroy($cart->id);
            }
            $this->createOrderAddress($orderDetails, $userId, $order);
        });
        return $order;

    }

    public function createOrderAddress(array $newDetails, $userId, $order)
    {
        OrderAddress::create([
            'user_id'   => $userId,
            'order_id'  => $order->id,
            'firstname' => $newDetails['firstname'],
            'lastname'  => $newDetails['lastname'],
            'address1'  => $newDetails['address1'],
            'address2'  => $newDetails['address2'] ?? '',
            'postal'    => $newDetails['postal'] ?? '',
            'city_id'   => $newDetails['city_id'],
            // 'country_id'=> $newDetails['country_id'],
            'telephone' => $newDetails['telephone'],
            'email'     => $newDetails['email'],
        ]);

    }

    public function updateOrder($orderId, array $newDetails)
    {
        // return Order::whereId($orderId)->update($newDetails);
    }
}

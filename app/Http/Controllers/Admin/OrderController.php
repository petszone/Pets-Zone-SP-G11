<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\OrderAddress;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        // $this->middleware('permission:view_order|add_order', ['only' => ['index','store']]);
        // $this->middleware('permission:add_order', ['only' => ['create','store']]);
        // $this->middleware('permission:edit_order', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete_order', ['only' => ['destroy']]);        
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();
        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $user = auth()->user();
        $order = $this->orderRepository->getOrderProductsById($id);
        $address = OrderAddress::where('order_id', $order->id)->first();
        return view('admin.order.show', compact('user', 'order', 'address'));
    }
}

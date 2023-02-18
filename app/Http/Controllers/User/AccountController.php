<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountRequest;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\User;
use App\Models\Address;
use App\Models\Appointment;
use App\Models\OrderAddress;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private OrderRepositoryInterface $orderRepository;
    private AdvertisementRepositoryInterface $AdsRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, AdvertisementRepositoryInterface $AdsRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->AdsRepository = $AdsRepository;
    }

    public function index()
    {
        $user = auth()->user();
        $data['user'] = $user;
        $data['my_orders'] = $this->orderRepository->getOrderByUserId($user->id);
        $data['my_addersses'] = OrderAddress::where('user_id', $user->id)->with('country','city')->get();
        $data['ads'] = $this->AdsRepository->getAdsByUserId();
        $data['appointments'] = Appointment::where('user_id', $user->id)->get();
        return view('website.account', $data);
    }

    public function update(UpdateAccountRequest $request)
    {
        $data = $request->except('_token');
        $user = User::where('id', auth()->user()->id)->first();
        $user->update($data);
        return back();
    }

    public function orderDetails($orderId)
    {
        $user = auth()->user();
        $order = $this->orderRepository->getOrderProductsById($orderId);
        $address = OrderAddress::where('order_id', $order->id)->first();
        return view('website.order_details', compact('order', 'user', 'address'));
    }
}

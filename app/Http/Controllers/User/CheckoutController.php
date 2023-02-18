<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Address;
use App\Models\City;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaytabsPayment;

class CheckoutController extends Controller
{
    private CartRepositoryInterface $cartRepository;
    private OrderRepositoryInterface $orderRepository;

    public function __construct(CartRepositoryInterface $cartRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
    }
    
    public function index()
    {
        $user_cart = $this->cartRepository->getUserCartProducts(auth()->user()->id);
        $cities = City::get();
        return view('website.checkout', compact('user_cart', 'cities'));
    }

    public function placeOrder(CreateOrderRequest $request)
    {
        $user = auth()->user();
        $data = $request->except('_token');
        $order = $this->orderRepository->createOrder($data);
        $payment = new PaytabsPayment();
        $redirect_url = $payment->pay(
            $order->total, 
            $user_id = $user->id, 
            $user_first_name = $user->firstname, 
            $user_last_name = $user->lastname, 
            $user_email = $user->email, 
            $user_phone = $user->telephone, 
            $source = null
        );
        return redirect()->to($redirect_url['redirect_url']);
    }

    public function payment_verify(Request $request)
    {
        $payment = new PaytabsPayment();

        $payment->verify($request);
        return redirect()->route('home.index');
    }

    // public function getCitiesByCountryId(Request $request)
    // {
    //     $cities = City::where('country_id', $request->countryid)->get();
    //     return response()->json([
    //         'data' => $cities
    //     ]);
    // }
}

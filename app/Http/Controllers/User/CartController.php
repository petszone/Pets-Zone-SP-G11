<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CartRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private CartRepositoryInterface $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {
        $user_cart = $this->cartRepository->getUserCartProducts(auth()->user()->id);
        return view('website.cart', compact('user_cart'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qnty' => 'required',
        ]);
        $this->cartRepository->addProduct($request->product_id, $request->qnty, auth()->user()->id);
        return redirect()->back()->with([
            'msg_status' => 'error',
            'msg_title' => 'عذرا',
            'msg_content' => 'لا يمكنك الإضافة إلا عند تسجيل الدخول',
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qnty' => 'required',
        ]);
        $this->cartRepository->updateProductQuantity($request->product_id, $request->qnty, auth()->user()->id);
        return response()->json('success');
    }

    public function destroy($id)
    {
        $this->cartRepository->deleteProduct($id, auth()->user()->id);
    }
}

<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $products = Product::with('media')->where('name','LIKE', "%{$request->search}%" )->orderBy('id', 'DESC')->paginate(5);
        }else{
            $products = Product::with('media')->orderBy('id', 'DESC')->paginate(10);
        }

        return view('website.shop', compact('products', 'request'));
    }
}

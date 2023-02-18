<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        // $this->middleware('permission:view_product|add_product', ['only' => ['index','store']]);
        // $this->middleware('permission:add_product', ['only' => ['create','store']]);
        // $this->middleware('permission:edit_product', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete_product', ['only' => ['destroy']]);  
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(CreateProductRequest $request, $id = null)
    {
        $data = $request->except('_token');
        $this->productRepository->createProduct($data);

        return redirect()->route('adm.product.index');
    }

    public function update(UpdateProductRequest $request, $id = null)
    {
        $data = $request->except('_token');
        $this->productRepository->updateProduct($id, $data);
        return redirect()->route('adm.product.index');
    }

    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('admin.product.index', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('admin.product.edit', compact('product'));
    }

    public function destroy($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

    public function addMoreMedia(Request $request)
    {
        $mediaDetails = $request['images'];
        $product = Product::find($request->prod_id);
        $this->productRepository->addMedia($mediaDetails, $product);
        return 'success';
    }
}

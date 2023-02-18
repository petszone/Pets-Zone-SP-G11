<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Media;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductList;
use App\Models\ProductMedia;
use App\Models\Text;
use App\Traits\SaveImageTrait;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    use SaveImageTrait;
        
    public function getAllProducts()
    {
        return Product::with('media')->orderBy('id', 'DESC')->get();
    }

    public function getProductById($productId)
    {
        $product = Product::with('media')->where('id', $productId)->first();
        return $product;
    }

    public function createProduct(array $productDetails)
    {
        DB::transaction(function () use($productDetails) {
            $product = Product::create([
                'name'   => $productDetails['name'], 
                'shortdesc'   => $productDetails['shortdesc'], 
                'longdesc'   => $productDetails['longdesc'], 
                'price'   => $productDetails['price'],
                'rebate'   => $productDetails['rebate'],
                'taxrate'   => $productDetails['taxrate'],
                'instock'   => $productDetails['instock'], 
                'status'   => $productDetails['status'] ?? 1, 
            ]);
            $this->addMedia($productDetails['images'], $product);
        });
        return 'success';
    }
 
    public function addMedia($productDetails, $product)
    {
        foreach($productDetails as $product_image)
        {
            $media = Media::create([
                'link'  => $this->uploadImage($product_image, 'products'),
            ]);
            $product->media()->save($media);
        }
        return 'success';
    }

    public function updateProduct($productId, array $newDetails)
    {
        $product = Product::findOrFail($productId);
        DB::transaction(function () use($newDetails, $product) {
            $product->update([
                'name'       => $newDetails['name'], 
                'shortdesc'  => $newDetails['shortdesc'], 
                'longdesc'   => $newDetails['longdesc'], 
                'price'     => $newDetails['price'],
                'rebate'    => $newDetails['rebate'],
                'taxrate'   => $newDetails['taxrate'],
                'instock'   => $newDetails['instock'], 
                'status'    => $newDetails['status'], 
            ]);
            // $this->updateMedia($newDetails['images'], $product);
        });
        return 'success';
    }

    public function updateMedia($newDetails, $product)
    {
        $sync_media_ids = [];
        foreach($newDetails as $key=>$value)
        {
            $media = Media::find($key);
            $media->update([
                'link'  => $this->uploadImage($value, 'products'),
            ]);
            $sync_media_ids[$key] = $media->id;
        }
        $product->media()->sync($sync_media_ids);

        return 'success';
    }

    public function deleteProduct($productId)
    {
        DB::transaction(function () use($productId) {
            $product = Product::find($productId);
            $product_medias = ProductMedia::where('product_id', $productId)->get();
            foreach($product_medias as $product_media){
                Media::destroy($product_media->media_id);
            }
            $product->media()->detach();
            Product::destroy($productId);
            $cart = Cart::where('product_id', $productId)->first();
            if($cart){
                Cart::destroy($cart->id);
            }
            OrderProduct::where('product_id', $productId)->get()->each(function ($product) {
                $product->delete();
            });
        });

        return 'success';
    }
}

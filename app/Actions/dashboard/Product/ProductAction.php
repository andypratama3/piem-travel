<?php

namespace App\Actions\dashboard\Product;

use App\Models\Produk;
use Illuminate\Support\Str;
use App\DataTransferObjects\ProductData;

class ProductAction
{
    public function execute(ProductData $productData)
    {
        if($productData->image) {
            //request foto
            $foto = $productData->image;
            $ext = $foto->getClientOriginalExtension();

            //upload foto to folder
            $upload_path = public_path('storage/images/products/');
            $picture_name = 'Product_'.Str::slug($productData->name).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }else{
            $product = Produk::where('slug', $productData->slug)->first();
            $picture_name = $product->image;

        }

        $product = Produk::updateOrCreate(
            ['slug' => $productData->slug],
            [
                'name' => $productData->name,
                'description' => $productData->description,
                'image' => $picture_name,
                'price' => $productData->price,
                'stock' => $productData->stock,
                'status' => $productData->status
            ]
        );

        if (empty($productData->slug)) {
            $product->category()->attach($productData->category);
        } else {
            $product->category()->sync([$productData->category]);
        }
    }
}


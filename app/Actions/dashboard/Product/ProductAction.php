<?php

namespace App\Actions\dashboard\Product;

use App\Models\Produk;
use Illuminate\Support\Str;

class ProductAction
{
    public function execute($productData)
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

        $price = str_replace('.', '', ($productData->price));

        $product = Produk::updateOrCreate(
            ['slug' => $productData->slug],
            [
                'name' => $productData->name,
                'description' => $productData->description,
                'image' => $picture_name,
                'price' => intval($price),
                'stock' => $productData->stock,
                'type' => $productData->type,
                'periode' => $productData->periode,
                'status' => $productData->status
            ]
        );

        if (empty($productData->slug)) {
            $product->category()->attach($productData->category);
        } else {
            $product->category()->sync($productData->category);
        }
    }
}


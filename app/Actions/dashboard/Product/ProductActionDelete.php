<?php
namespace App\Actions\dashboard\Product;

use App\Models\Produk;
use Illuminate\Support\Facades\Storage;



class ProductActionDelete
{
    public function execute(Produk $product)
    {
        $product->category()->detach();
        Storage::delete(['images/products/'. $product->image]);
        $product->delete();
        return $product;
    }
}

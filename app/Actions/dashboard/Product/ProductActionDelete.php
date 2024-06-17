<?php
namespace App\Actions\dashboard\Product;



class ProductActionDelete
{
    public function execute($slug)
    {
        $product = Produk::where('slug', $slug)->firstOrFail();
        $product->delete();
        return $product;
    }
}

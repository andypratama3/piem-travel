<?php
namespace App\Actions\dashboard\Kategori;

use App\Models\Category;


class KategoriActionDelete
{
    public function execute($slug)
    {
        $kategori = Category::where('slug', $slug)->firstOrFail();
        $kategori->delete();
        return $kategori;
    }
}

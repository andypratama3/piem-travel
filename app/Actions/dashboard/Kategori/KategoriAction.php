<?php
namespace App\Actions\dashboard\Kategori;

use App\Models\Category;

class KategoriAction
{
    public function execute($kategoriData)
    {
        $kategori = Category::updateOrCreate(
            [ 'slug' => $kategoriData->slug, ],
            [
                'name' => $kategoriData->name,
                'description' => $kategoriData->description,
            ]
        );

        return $kategori;
    }
}

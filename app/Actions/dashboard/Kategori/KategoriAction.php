<?php
namespace App\Actions\dashboard\Kategori;

use App\Models\Category;
use App\DataTransferObjects\KategoriData;

class KategoriAction
{
    public function execute(KategoriData $kategoriData)
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

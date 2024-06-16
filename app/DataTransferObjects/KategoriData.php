<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\dashboard\Kategori\KategoriRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class KategoriData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(KategoriRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getDescription(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama Kategori tidak boleh kosong!',
            'description.required' => 'Kolom Deskripsi tidak boleh kosong!',
        ];
    }
}

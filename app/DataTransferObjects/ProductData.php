<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\dashboard\Kategori\KategoriRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?UploadedFile $image,
        public readonly string $price,
        public readonly string $stock,
        public readonly string $status,
        public readonly string $type,
        public readonly string $periode,
        public readonly array $category,
        public readonly string $description,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(KategoriRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getImage(),
            $request->getPrice(),
            $request->getStock(),
            $request->getStatus(),
            $request->getType(),
            $request->getPeriode(),
            $request->getCategory(),
            $request->getDescription(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required|max:255' => 'Column Name Product Cannot Be Empty!',
            'description.required' => 'Column Description Product Cannot Be Empty!',
            'price.required' => 'Column Price Product Cannot Be Empty!',
            'stock.required' => 'Column Stock Product Cannot Be Empty!',
            'status.required' => 'Column Status Product Cannot Be Empty!',
            'category.required' => 'Column Category Product Cannot Be Empty!',
            'type.required' => 'Column Type Product Cannot Be Empty!',
            'periode.required' => 'Column Periode Product Cannot Be Empty!',
            'image required|mimes:png,jpg,jpeg' => 'Column Image Product Cannot Be Empty!',
        ];
    }
}

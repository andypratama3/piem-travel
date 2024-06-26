<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\dashboard\Access\PermissionRequest;

class PermissionData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly array $guard_name,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(PermissionRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getGuardName(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama Name Cannot Be Null!',
            'guard_name.required' => 'Kolom Guard Permission Cannot Be Null!',
        ];
    }
}

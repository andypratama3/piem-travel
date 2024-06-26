<?php

namespace App\Actions\dashboard\Access\Permission;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionAction
{
    public function execute($PermissionData)
    {
        $name = $PermissionData->name;
        $guardNames = $PermissionData->guard_name;

        // Update or create the main permission record
        $mainPermission = Permission::updateOrCreate(
            ['slug' => $PermissionData->slug],
            [
                'name' => $name,
                'guard_name' => implode('-', $guardNames),
                'slug' => $name . '-' . Str::slug(implode('-', $guardNames)), 
            ]
        );


    }
}

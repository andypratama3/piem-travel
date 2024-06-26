<?php

namespace App\Http\Controllers\dashboard\Access;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\PermissionData;
use App\Actions\dashboard\Access\Permission\PermissionAction;

class PermissionsController extends Controller
{
    public function index()
    {
        $limit = 10;
        $permissions = Permission::select('name')->groupBy('name')->orderBy('name')->paginate($limit);
        $count = $permissions->total();
        $no = $limit * ($permissions->currentPage() - 1);

        return view('content.dashboard.access.permissions.index', compact('permissions', 'count','no'));
    }

    public function create()
    {
        return view('content.dashboard.access.permissions.create');
    }

    public function store(PermissionData $PermissionData, PermissionAction $permissionAction)
    {
        $permissionAction->execute($PermissionData);
        flash()->success('Berhasil Menambahkan Task');
    }

    public function show(Permission $permission)
    {
        return view('content.dashboard.access.permisions.show', compact('permission'));
    }

    public function edit($name)
    {
        $permission = Permission::where('name', $name)->first();
       
        return view('content.dashboard.access.permissions.edit', compact('permission'));
    }


    public function update(PermissionData $PermissionData, PermissionAction $permissionAction)
    {
        $permissionAction->execute($PermissionData);
        flash()->success('Berhasil Menambahkan Task');
    }
}

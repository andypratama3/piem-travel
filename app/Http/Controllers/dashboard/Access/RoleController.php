<?php

namespace App\Http\Controllers\dashboard\Access;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderby('name','asc')->get();
        return view('content.dashboard.access.role.index', compact('roles'));
    }
}

<?php

namespace App\Http\Controllers\dashboard\Access;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $limit = 10;
        $roles = Role::orderby('name','asc')->paginate($limit);
        $count = $roles->count();
        $no = $count - (($roles->currentPage() - 1) * $limit);
        
        return view('content.dashboard.access.role.index', compact('roles', 'no', 'count'));
    }

    public function create()
    {
        return view('content.dashboard.access.role.create');
    }
}

<?php

namespace App\Http\Controllers\dashboard\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('content.dashboard.access.permissions.index');
    }

    public function create()
    {
        return view('content.dashboard.access.permissions.create');
    }
}

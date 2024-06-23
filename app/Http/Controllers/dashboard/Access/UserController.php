<?php

namespace App\Http\Controllers\dashboard\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('content.dashboard.access.users.index');
    }
}

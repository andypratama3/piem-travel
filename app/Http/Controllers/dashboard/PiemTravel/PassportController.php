<?php

namespace App\Http\Controllers\dashboard\PiemTravel;

use App\Models\Passport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PassportController extends Controller
{
    public function index()
    {
        $passport_count = Passport::count();
        $passport_coutn_pending = Passport::where('status', 'pending')->count();
        $passport_coutn_approved = Passport::where('status', 'approved')->count();
        return view('content.dashboard.data.piem-travel.passport.index', compact('passport_count', 'passport_coutn_pending', 'passport_coutn_approved'));
    }

    public function dataTable()
    {
        $passports = Passport::select('id', 'ktp', 'kk', 'akta_kelahiran', 'ijazah', 'surat_kawin', 'passport', 'status', 'slug');
        return DataTables::of($passports)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.piem-travel.passport.show', $row->slug) . '" class="btn btn-sm btn-rounded btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.piem-travel.passport.edit', $row->slug) . '" class="btn btn-sm btn-rounded btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-rounded btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }



}

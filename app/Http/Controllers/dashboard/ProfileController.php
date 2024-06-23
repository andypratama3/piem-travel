<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\DeleteProfilePhoto;
use App\Actions\Fortify\UpdateUserProfileInformation;

class ProfileController extends Controller
{
    public function index()
    {
        return view('content.dashboard.profile.index');
    }

    public function deleteProfile(DeleteProfilePhoto $deleteProfilePhoto)
    {
        $user = Auth::user();
        $deleteProfilePhoto->execute($user);
        if($deleteProfilePhoto) {
            return response()->json([
                'status' => 200,
                'message' => 'Profile photo deleted successfully',
            ]);
        }else {
            return response()->json([
                'status' => 500,
                'message' => 'Profile photo could not be deleted',
            ]);
        }
    }
}

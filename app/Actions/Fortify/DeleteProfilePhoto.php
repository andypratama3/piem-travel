<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Storage;

class DeleteProfilePhoto
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function execute($user)
    {
        $user = User::find($user->id);
        if ($user->profile_photo_path) {
            Storage::disk('profile_photos')->delete($user->profile_photo_path);
        }
        $user->profile_photo_path = null;
        $user->save();
    }
}

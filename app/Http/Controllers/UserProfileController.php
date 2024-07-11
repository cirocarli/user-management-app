<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
  
    public function index($id)
    {
        $user = User::findOrFail($id);
        $user_meta = UserMeta::where('user_id', $id)->firstOrFail();
        return Inertia::render('Profile/Info', compact(['user', 'user_meta']));
    }

}

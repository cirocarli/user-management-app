<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Redirect;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        $user_meta = UserMeta::orderBy('user_id', 'asc')->get();
        return Inertia::render('Admin/Users', compact(['users', 'user_meta']));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_meta = UserMeta::where('user_id', $id)->firstOrFail();
        return Inertia::render('Admin/Update', compact(['user', 'user_meta']));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $name = $request->name;
        $email = $request->email;

        $user->name = $name;
        $user->email = $email;
        $user_data = $user->save();

        $user_meta = UserMeta::where('user_id', $id)->firstOrFail();
        $last_name = $request->last_name;
        $address = $request->address;
        $zip_code = $request->zip_code;
        $city = $request->city;
        $state = $request->state;
        $country = $request->country;

        $user_meta->last_name = $last_name;
        $user_meta->address = $address;
        $user_meta->zip_code = $zip_code;
        $user_meta->city = $city;
        $user_meta->state = $state;
        $user_meta->country = $country;
        $user_meta_data = $user_meta->save();


        if ($user_data && $user_meta_data)
        {
            return Redirect::route('admin.users');
        } 
    }

    public function delete($id)
    {
        UserMeta::where('user_id', $id)->firstOrFail()->delete();
        User::findOrFail($id)->delete();
        
        return Redirect::route('admin.users');
    }
}

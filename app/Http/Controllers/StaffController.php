<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public function index(){
        $staffs = User::all();
        return view('staff.index', compact('staffs'));
    }

    public function edit(User $user){
        $roles = Role::get();
        return view('staff.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user){
        if($request->photo){
            Storage::delete($user->photo);
            $photo = $request->file('photo')->store("images/users");
        }else{
            $photo = $user->photo;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'salary' => $request->salary,
            'photo' => $photo,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }
}

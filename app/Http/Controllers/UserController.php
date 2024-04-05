<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user_data = User::findOrFail(auth()->user()->id);
        return view('profile.index', [
            'user_data' => $user_data,
        ]);
    }

    public function edit($id)
    {
        $user_data = User::findOrFail($id);
        return view('profile.edit', [
            'user_data' => $user_data,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:75',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|max:15',
            'address' => 'required|max:100',
        ]);

        $user = User::findOrFail($id);
        $fileName = $user->photo;
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name.'-'. now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('users/profile', $fileName);
        }

        $newData = $request->all();
        $newData['photo'] = $fileName;
        $user->update($newData);
        return redirect('/profile');
    }
}

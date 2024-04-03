<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        $user = User::findOrFail($id);
        $fileName = $request->photo;
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

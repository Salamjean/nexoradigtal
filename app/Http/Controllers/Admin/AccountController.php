<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

/** "Mon compte": the administrator changes their name, login email and password. */
class AccountController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.account', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190', Rule::unique('users', 'email')->ignore($user->id)],
            'current_password' => ['required', 'current_password'],
            'password' => ['nullable', 'confirmed', Password::min(8)],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if (filled($data['password'] ?? null)) {
            $user->password = $data['password'];
        }
        $user->save();

        return redirect()->route('admin.account.edit')->with('status', 'Votre compte a été mis à jour.');
    }
}

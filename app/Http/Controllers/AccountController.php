<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Indica a palavra-passe atual.',
            'current_password.current_password' => 'A palavra-passe atual está incorreta.',
            'password.required' => 'Indica a nova palavra-passe.',
            'password.min' => 'A palavra-passe deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'A confirmação da palavra-passe não coincide.',
        ]);

        $user = $request->user();

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Palavra-passe atualizada com sucesso.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'profile_photo.required' => 'Seleciona uma imagem.',
            'profile_photo.image' => 'O ficheiro tem de ser uma imagem.',
            'profile_photo.mimes' => 'A imagem deve ser JPG, JPEG, PNG ou WEBP.',
            'profile_photo.max' => 'A imagem não pode ultrapassar 2MB.',
        ]);

        $user = $request->user();

        // apagar foto antiga
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // guardar nova foto
        $path = $request->file('profile_photo')->store('profile-photos', 'public');

        $user->profile_photo = $path;
        $user->save();

        return back()->with('success', 'Imagem de perfil atualizada com sucesso.');
    }
}

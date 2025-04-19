<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function paginaUsuario($id = null)
    {
        $usuario = $id ? User::find($id) : Auth::user();
    
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }
    
        // Pegando apenas os posts do usuário específico
        $posts = $usuario->posts()->latest()->get();
    
        return view('pages.perfil', [
            'user' => $usuario,
            'posts' => $posts
        ]);
    }

    
    public function edit()
    {
        $user = Auth::user();
        return view('pages.EditarPerfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Atualiza os dados básicos
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        try {
            // Upload da imagem de perfil
            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                if (!empty($user->profile_image)) {
                    Storage::disk('public')->delete($user->profile_image);
                }

                $profileImage = $request->file('profile_image');
                $profileImageName = md5($profileImage->getClientOriginalName() . microtime()) . '.' . $profileImage->getClientOriginalExtension();
                $profileImagePath = $profileImage->storeAs('profile_image', $profileImageName, 'public');

                $user->profile_image = $profileImagePath; // Caminho relativo salvo no banco
            }

            // Upload da imagem de banner
            if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
                if (!empty($user->banner_image)) {
                    Storage::disk('public')->delete($user->banner_image);
                }

                $bannerImage = $request->file('banner_image');
                $bannerImageName = md5($bannerImage->getClientOriginalName() . microtime()) . '.' . $bannerImage->getClientOriginalExtension();
                $bannerImagePath = $bannerImage->storeAs('banner_image', $bannerImageName, 'public');

                $user->banner_image = $bannerImagePath; // Caminho relativo salvo no banco
            }

            $user->save();

            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao atualizar o perfil: ' . $e->getMessage());
        }
    }
}
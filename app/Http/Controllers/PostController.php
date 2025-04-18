<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->latest()->get(); // pega posts com os dados do user
        return view('pages.home', compact('posts')); // 'home' é o nome do seu Blade
    }
    // Criar um novo post
    public function create()
    {
        return view('posts.create');
    }

    // Armazenar um novo post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->input('content');

        // Se houver uma imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = md5($image->getClientOriginalName() . microtime()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('posts', $imageName, 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('home')->with('success', 'Post criado com sucesso!');
    }

    // Exibir um post específico
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Deletar um post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Você não tem permissão para excluir esse post.');
        }

        // Apagar a imagem se houver
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso!');
    }
}

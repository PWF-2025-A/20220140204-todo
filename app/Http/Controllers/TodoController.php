<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        // Ambil semua todo milik user yang sedang login, urutkan terbaru dulu
        $todos = Todo::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->get();

        // Kirim ke tampilan
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
        ]);

        Todo::create([
            'title' => ucfirst($request->title),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo created successfully.');
    }

    public function edit($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('todo.edit', compact('todo'));
    }
}

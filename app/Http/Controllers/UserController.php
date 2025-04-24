<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $search = request('search');

        $users = User::with('todo')
            ->where('id', '!=', 1)
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('user.index', compact('users'));
    }
}

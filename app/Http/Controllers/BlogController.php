<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function allPosts()
    {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        return view('blog', compact('posts', 'categories', 'users'));
    }

    public function onePost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $users = User::all();
        $comments = Comment::all();
        return view('post', compact('post', 'categories', 'users', 'comments'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $users = User::all();
        $search = $request->input('search');
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
        return view('blog', compact('posts', 'categories', 'users'));
    }

    public function searchByTag(Request $request)
    {
        $categories = Category::all();
        $users = User::all();
        $search = $request->input('search');
        $posts = Post::query()
            ->where('id_category', 'LIKE', "%{$search}%")
            ->get();
        return view('blog', compact('posts', 'categories', 'users'));
    }
}

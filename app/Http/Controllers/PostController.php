<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadTrait;

class PostController extends Controller
{

    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myPosts()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts/myPosts', ['posts' => $posts] , ['categories' => $categories]);
    }

    public function addPost()
    {
        $categories = Category::all();
        return view('posts/addPost', ['categories' => $categories]);
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts/editPost', ['categories' => $categories], ['post' => $post]);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        return view('posts/deletePost', ['post' => $post]);
    }

    public function create(Request $request){
        $rules = [
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'id_user' => ['required', 'int', 'max:20'],
            'id_category' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-post')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $post = new Post();
                $post -> title = $data['title'];
                $post -> description = $data['description'];
                $post -> id_user = $data['id_user'];
                $post -> id_category = $data['id_category'];
                $image = $request->file('cover');
                $name = time();
                $folder = '/img/blog/';
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $post -> cover = $filePath;
                $post->save();
                return redirect('add-post')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('add-post')->with('failed',"operation failed");
            }
        }
    }

    public function edit(Request $request, $id){
        $post = Post::find($id);
        $rules = [
            'cover' => ['image', 'mimes:jpeg,png,jpg,gif'],
            'old' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'id_user' => ['required', 'int', 'max:20'],
            'id_category' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-post/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                if ($request->has('cover')) {
                    $this->deleteOne('public', $data['old']);
                    $image = $request->file('cover');
                    $name = time();
                    $folder = '/img/blog/';
                    $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                    $this->uploadOne($image, $folder, 'public', $name);
                    $post -> cover = $filePath;
                } else {
                    $post -> cover = $data['old'];
                }
                $post -> title = $data['title'];
                $post -> description = $data['description'];
                $post -> id_user = $data['id_user'];
                $post -> id_category = $data['id_category'];
                $post->save();
                return redirect('edit-post/'.$id.'')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('edit-post/'.$id.'')->with('failed',"operation failed");
            }
        }
    }

    public function delete($id) {
        $post = Post::find($id);
        try {
            $this->deleteOne('public', $post->cover);
            $post->delete();
            return redirect('myposts')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('myposts')->with('failed',"operation failed");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
        $link = $request->input();
        $rules = [
            'comment' => ['required', 'string', 'max:255'],
            'id_post' => ['required', 'int', 'max:20'],
            'id_user' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('post/'.$link['id_post'])
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $comment = new Comment();
                $comment -> comment = $data['comment'];
                $comment -> id_post = $data['id_post'];
                $comment -> id_user = $data['id_user'];
                $comment->save();
                return redirect('post/'.$link['id_post'])->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('post/'.$link['id_post'])->with('failed',"operation failed");
            }
        }
    }
}

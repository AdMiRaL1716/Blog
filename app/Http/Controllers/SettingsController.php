<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
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

    public function editImage()
    {
        return view('settings/editImage');
    }

    public function editImg(Request $request){
        $id = $request->input();
        $user = User::find($id['id']);
        $rules = [
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'required'],
            'old' => ['required', 'string', 'max:255'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-image')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                if ($request->has('image')) {
                    $image = $request->file('image');
                    if ($data['old'] != '/img/blog/01.png') {
                        $this->deleteOne('public', $data['old']);
                    }
                    $name = time();
                    $folder = '/img/blog/profile/';
                    $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                    $this->uploadOne($image, $folder, 'public', $name);
                    $user -> image = $filePath;
                } else {
                    $user -> image = $data['old'];
                }
                $user->save();
                return redirect('edit-image')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('edit-image')->with('failed',"operation failed");
            }
        }
    }
}

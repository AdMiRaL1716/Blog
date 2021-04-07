<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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

    public function allCategories()
    {
        $categories = Category::all();
        return view('categories/allCategories', ['categories' => $categories]);
    }

    public function addCategory()
    {
        return view('categories/addCategory');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('categories/editCategory', ['category' => $category]);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        return view('categories/deleteCategory', ['category' => $category]);
    }

    public function create(Request $request){
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-category')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $category = new Category();
                $category -> name = $data['name'];
                $category->save();
                return redirect('add-category')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('add-category')->with('failed',"operation failed");
            }
        }
    }

    public function edit(Request $request, $id){
        $category = Category::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-category/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $category -> name = $data['name'];
                $category->save();
                return redirect('edit-category/'.$id.'')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('edit-category/'.$id.'')->with('failed',"operation failed");
            }
        }
    }

    public function delete($id) {
        $category = Category::find($id);
        try {
            $category->delete();
            return redirect('categories')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('categories')->with('failed',"operation failed");
        }
    }
}

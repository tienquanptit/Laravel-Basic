<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manageCategory(){
        $categories = Category::where('parent_id',0)->get();
//        pluck dùng để lấy toàn bộ 1 field nào đó và trả về mảng chứa
//        giá trị của tất cả các field đó.
        $allCategories = Category::pluck('title','id')->all();

        return view('categoryTreeview',compact('categories','allCategories'));
    }

    public function addCategory(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id'])? 0 : $input['parent_id'];

        Category::create($input);

        return back()->with('success', 'New Category added successfully.');
    }
}

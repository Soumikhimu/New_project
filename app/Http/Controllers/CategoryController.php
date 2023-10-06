<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesindex ()
    {
        $data['categories']=Category::where('parent_id', null)->get();
        return view('categories.index' , $data);
    }
    

    public function categoryedit ($id )
    {
        $data['categories']=Category::find($id);
        
        return view('categories.edit' , $data);
    }

    public function categoryupdate(Request $request) {
 
        $request->validate([
            'name' => 'required',
        ]);

        $data=['name'=>$request->name,'parent_id'=>$request->parent_id];
        
        Category::where(['id'=>$request->editid])->update($data);
        return  redirect()->route('categoriesindex');
    }

    public function categorydestroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('categoriesindex')->with('success', 'Category deleted successfully');
}
    
    public function createCategory() {
        $data["categories"] = Category::where('parent_id', null)->get();
        return view("category",$data);
    }


    public function storeCategory(Request $request) {
 
        $request->validate([
            'name' => 'required',
        ]);

        $data=['name'=>$request->name,'parent_id'=>$request->parent_id];
        
        Category::create($data);
        return back();
    }

    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class ManageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
        ->orderBy('id', 'desc')
        ->where('delete_status', 0)
        ->limit(10)
        ->get();
        return view('master/category/index', ['title'=>'All Catgeories', 'categories'=>$categories]);
    }

    public function category_load_more(Request $request){
        $page = $request->page;
        if($page > 0){
            $offset = $page * 10;
            $categories = DB::table('categories')
                ->orderBy('id', 'desc')
                ->where('delete_status', 0)
                ->offset($offset)
                ->limit(10)
                ->get();
            $sno = $offset + 1;
            return view('master/category/load_more', ['categories'=>$categories, 'sno'=>$sno]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'category_type' => 'required',
        ]);
        if(Category::where('name',$request->category)->first() == null){
            if(DB::table('categories')->insert(['name'=>$request->category, 'type'=>$request->category_type])){
                return back()->with('success','Category Added Successfully');
            }else{
                return back()->with('error','Please try Later');
            }
        }else{
            return back()->with('error','This Catgeory Already Exists');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('master/category/edit', ['title'=>'Admin - Edit Catgeories', 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required',
            'category_type' => 'required'
        ]);
        Category::where('id',$id)->update(['name'=>$request->category, 'type'=>$request->category_type]);
        return redirect('admin/category')->with('success','Catgeory Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $find = Category::findorfail($id);
        if($id > 0){
            $find_blog = Blog::where('cat_id', $id)->get(); 
            if($find_blog->isEmpty()){
                Category::where('id',$id)->update(['delete_status' => 1]);
                return back()->with('success', 'Category Deleted Successfully');
            }else{
                return back()->with('error', count($find_blog)." Blogs in this Catgeory. So Can't delete");
            }
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
    // change category status
    public function change_status($id){
        $cat = Category::find($id);
        if($cat !== null){
            if($cat->status == 1){
                $cat->status = 0;
            }else{
                $cat->status = 1;
            }
            $cat->update();
            return back()->with('success', 'Category Status Changed');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
}

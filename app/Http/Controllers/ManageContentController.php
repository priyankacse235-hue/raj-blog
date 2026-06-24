<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class ManageContentController extends Controller
{
    public function index($id){
        $blogs = [];
        $blog_data = Blog::findOrFail($id);
        $contents = Content::where('blog_id',$id)->get();
        return view('master/sub_contents/index', ['title'=>'Admin - All Sub blogs', 'blogs'=>$blogs,'contents'=>$contents, 'blog_data'=>$blog_data]);
    }

    public function create_content(Request $request,  $id){
        if($request->method() == 'POST'){
            $request->validate([
                'heading' => 'required',
                'details' => 'required',
            ]);
            $data = [];
            if($request->show !== null){
                $data['show'] = $request->show;
            }
            if($request->file('image') !== null){
                $data['image'] = $request->file('image')->storeAs('/contents', time().$request->file('image')->getClientOriginalName());
            }
            $data['blog_id'] = $id;
            $data['heading'] = $request->heading;
            $data['content'] = $request->details;
            if(DB::table('contents')->insert($data)){
                return redirect('admin/blog_content/'.$id)->with('success','Sub Content Added In This Blog');
            }else{
                return back()->with('error','Please Try Later');
            }
        }else{
            $blog_data = Blog::findOrFail($id);
            return view('master/sub_contents/create', ['title','Admin - Add Content','blog_data'=>$blog_data]);
        }
    }

    public function update_content(Request $request, $id, $blog_id){
        if($request->method() == 'GET'){
            $blog_data = Blog::where('id',$blog_id)->first();
            $content = DB::table('contents')->where('id',$id)->first();
            return view('master/sub_contents/edit', ['title'=>'Admin - Edit Content', 'content'=>$content, 'blog_data'=>$blog_data]);
        }else{
            $request->validate([
                'heading' => 'required',
                'details' => 'required',
            ]);
            $blog_data = Content::where('id',$id)->first();
            $data = [];
            if($request->show !== null){
                $data['show'] = $request->show;
            }
            if($request->file('image') !== null){
                if(Storage::delete($blog_data->image)){
                    $data['image'] = $request->file('image')->storeAs('/contents', time().$request->file('image')->getClientOriginalName());
                }
            }
            $data['heading'] = $request->heading;
            $data['content'] = $request->details;
            if(DB::table('contents')->where(['id'=>$id, 'blog_id'=>$blog_id])->update($data)){
                return redirect('admin/blog_content/'.$blog_id)->with('success','Sub Content Added In This Blog');
            }else{
                return back()->with('error','Please Try Later');
            }
        }
    }

    public function change_status($id){
        $contents = Content::where('id',$id)->first();
        if($contents->show){
            DB::table('contents')->where('id',$id)->update(['show'=>0]);
        }else{
            DB::table('contents')->where('id',$id)->update(['show'=>1]);
        }
        return back()->with('success','Content Status changed successfully');
    }
    
    public function content_delete($id){
        if($id > 0){
            $content = Content::findOrFail($id);
            if($content !== null){
                if(Storage::delete($content->image)){
                    $content->delete();
                    return back()->with('success', 'Blog Content Deleted Successfully');
                }else{
                    return back()->with('success', 'Blog ');
                }
            }else{
                return back()->with('error', 'Please Try Later');
            }
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
}

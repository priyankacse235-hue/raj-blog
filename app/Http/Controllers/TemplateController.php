<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Template;
use App\Models\UserImage;
use Illuminate\Support\Facades\Storage;



class TemplateController extends Controller
{
    public function index(){
        $temps = Template::join('categories', 'categories.id', '=', 'templates.cat_id')
            ->select('templates.title','templates.id','templates.created_at','templates.status', 'categories.name as category_name', 'templates.thumbnail')->limit(10)
            ->get();
   
        return view('master/templates/index', ['title'=>'Admin - Create Template', 'templates'=>$temps]);
    }

    public function create_template(){
        $categories = DB::table('categories')
        ->orderBy('id', 'desc')
        ->where('delete_status', 0)
        ->where('type', 1)
        ->get();
        $title = 'Create New Template';
        return view('master/templates/create_template', ['title'=>$title, 'categories' => $categories]);
    }

    public function save_template(Request $request){
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'slug' => 'required|string',    
        ]);

        $title = $request->name;
        $slug = $request->slug;

        // Save to database
        Template::create([
            'title' => $title,
            'slug' => $slug,
            'html' => $request->temp_html ?? '',
            'css' => $request->temp_css ?? '',
            'css' => $request->temp_js ?? '',
            'cat_id' => $request->category,
        ]);

        // redirect on design template page after creating 
        return redirect('admin/templates')->with('message', 'Template saved successfully');
    }

    public function load_file(){
        return view('master/templates/default');
    }

    public function edit_template($id){
        $categories = DB::table('categories')
        ->orderBy('id', 'desc')
        ->where('delete_status', 0)
        ->where('type', 1)
        ->get();        
        $temp = Template::join('categories', 'categories.id', 'templates.cat_id')
            ->where(['templates.id'=>$id])
            ->select('templates.*', 'categories.name as catgeory')->first();
    
        return view('master/templates/edit_template', ['title'=>'Edit Template', 'categories'=>$categories, 'temp'=>$temp]);
    }

    public function update_template(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',  
            'category' => 'required|integer', // assuming it's category_id
            'slug' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $temp = Template::findOrFail($id);
        // If new thumbnail is uploaded
        if ($request->hasFile('thumbnail')) {
            // Delete old image if exists
            if ($temp->thumbnail && Storage::exists($temp->thumbnail)) {
                Storage::delete($temp->thumbnail);
            }

            $imageName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs('templates', $imageName);
            $temp->thumbnail = $path;
        }

        $temp->cat_id = $request->category;
        $temp->slug = $request->slug;
        $temp->title = $request->name;
        $temp->save();

        return redirect()->back()->with('success', 'Template updated successfully.');
    }

    public function template_load_more(Request $request){
        $page = $request->page;
        if($page > 0){
            $offset = $page * 10;
            $temps = Template::join('categories', 'categories.id', '=', 'templates.cat_id')
            ->select('templates.title','templates.id','templates.created_at','templates.status', 'categories.name as category_name')->offset($offset)->limit(10)
            ->get();
            $sno = $offset + 1;
            return view('master/templates/load_more', ['templates'=>$temps, 'sno'=>$sno]);
        }
    }

    public function destroy($id){
        $find = Template::findorfail($id);
        $find->delete();
        return redirect()->back()->with('success', 'Template Deleted Successgully');
    }

    public function save_file(Request $request){
        
        $data = $request->validate([
            'html' => 'required|string',
            'css' => 'required|string',
            'json' => 'required|array',
            'tempid' => 'required|integer',
        ]);

        // Update existing template
        $template = Template::find($data['tempid']);

        if (!$template) {
            return response()->json(['error' => 'Template not found.'], 404);
        }

        $template->html = $data['html'];
        $template->css = $data['css'];
        $template->json_data = json_encode($data['json']); // store as JSON string
        $template->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Template saved successfully!'
        ]);
    }

    public function design($id){
        $template = Template::findOrFail($id);
        
        return view('master/templates/edit', ['template'=>$template]);
    }

    public function upload(Request $request){
        $user = auth()->user(); // make sure user is logged in
        $uploaded = [];

        foreach ($request->file('images') as $file) {
            // Create a unique filename
            $imageName = time() . '_' . $file->getClientOriginalName();

            // Store file in a custom directory with new name
            $path = $file->storeAs('/user-gallery', $imageName);

            // Save DB record
            $image = UserImage::create([
                'user_id' => $user->id,
                'image_path' => $path,
            ]);

            // Generate public URL
            $uploaded[] = ['url' => Storage::url($path)];
        }

        return response()->json($uploaded);
    }

    public function list(){
        $user = auth()->user(); // Get logged-in user
        $images = UserImage::where('user_id', $user->id)->get();

        $urls = $images->map(function ($img) {
            return [
                'url' => Storage::url($img->image_path),
            ];
        });

        return response()->json($urls);
    }

    public function change_status($id){
        $cat = Template::find($id);
        if($cat !== null){
            if($cat->status == 1){
                $cat->status = 0;
            }else{
                $cat->status = 1;
            }
            $cat->update();
            return back()->with('success', 'Template Status Changed');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
}

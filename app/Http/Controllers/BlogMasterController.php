<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogMasterController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')
            ->leftJoin('categories', 'categories.id', '=', 'blogs.cat_id')
            ->select('blogs.*', 'categories.name')
            ->orderBy('blogs.id', 'desc')
            ->limit(10);

        if (Auth::user()->user_type != 1) {
            $blogs->where('blogs.created_by', Auth::user()->id);
        }

        $blogs = $blogs->get();

        return view('master/blog/index', ['title'=>'Admin - All Blogs','blogs'=>$blogs]);
    }

    public function blog_load_more(Request $request){
        $page = $request->page;
        if($page > 0){
            $offset = $page * 10;
            $blogs = DB::table('blogs')
                ->leftJoin('categories', 'categories.id', '=', 'blogs.cat_id')
                ->select('blogs.*', 'categories.name')
                ->orderBy('blogs.id', 'desc')
                ->limit(10)->offset($offset);

            if (Auth::user()->user_type != 1) {
                $blogs->where('blogs.created_by', Auth::user()->id);
            }

            $blogs = $blogs->get();

            
            $sno = $offset + 1;
            return view('master/blog/load_more', ['blogs'=>$blogs, 'sno'=>$sno]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = DB::table('blogs')->get();
        $categories = DB::table('categories')->where('delete_status',0)->get();
        return view('master/blog/create', ['title'=>'Admin - All Blogs','blogs'=>$blogs, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_image' => 'required', 
            'short_desc' => 'required',
            'defination' => 'required',
            'category' => 'required',
        ]);
        $image_name = time().$request->file('blog_image')->getClientOriginalName();
        $image_path = $request->file('blog_image')->storeAs('/blog-images', $image_name);
        $blog = new Blog;
        
$blog->active = $request->show;
        $blog->cat_id = $request->category;
        $blog->title = $request->blog_title;
        $blog->slug = $request->slug;
        $blog->image = $image_path;
        $blog->defination = $request->defination;
        $blog->image_alt = $request->image_name;
        $blog->short_desc = $request->short_desc;
        $blog->created_by = Auth::user()->id;
        if($blog->save()){
            return redirect()->to(url('admin/blog'))->with('success', 'Blog Created Successfully');
            // return redirect()->back()->with('success', 'Blog Created Successfully');
        }else{
            return redirect()->back()->with('error', 'Please Try Again Letter');
        }
    }

    public function show(string $id)
    {
        dd($id);
        
    }

    public function edit(string $id)
    {
        // $blog = Blog::findOrFail($id);
        $blog = Blog::with('spamReports')->findOrFail($id);
        if ($blog->is_blocked == 1) {
            $spamReasons = $blog->spamReports->pluck('reason'); // Collection of reasons
        } else {
            $spamReasons = collect(); // Empty collection if not blocked
        }
        // dd($blog);
        $categories = DB::table('categories')->get();  
        return view('master/blog/edit', ['title'=>'Admin - Blog update','blog'=>$blog, 'categories'=>$categories, 'spam_reasons'=>$spamReasons]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'blog_title' => 'required', 
            'defination' => 'required',
            'short_desc' => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        if($request->file('blog_image')){
            if(Storage::delete($blog->image)){
                $image_name = time().$request->file('blog_image')->getClientOriginalName();
                $blog->image = $request->file('blog_image')->storeAs('/blog-images', $image_name);
            }
        }
        
        $blog->active = ($request->show == 1) ? 1 : 0;
        $blog->short_desc = $request->short_desc;
        $blog->title = $request->blog_title;
        $blog->slug = Str::slug($request->blog_title);
        $blog->defination = $request->defination;
     
        if($request->has('meta_title')){
            $blog->meta_title = trim($request->meta_title);
        }
        if($request->has('meta_keywords') && !empty($request->meta_keywords)){
            $tenmp = array_values(json_decode($request->meta_keywords)); 
            $temp_var = [];
            foreach ($tenmp as $temp_key => $temp_value) {
                $temp_var[] = $temp_value->value;
            }
            $blog->meta_keywords = implode(',', $temp_var);
        }
        if($request->has('meta_desc')){
            $blog->meta_desc = trim($request->meta_desc);
        }
        if($blog->save()){
            return redirect()->back()->with('success', 'Blog Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Please Try Again Letter');
        }
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if(Storage::delete($blog->image)){
            $blog->delete();
            return back()->with('success', 'Blog Post Deleted');
        }
        return back()->with('error', 'Blog Post Deleted');

    }

    public function blog_seo(Request $request , $id){
        $data = [];
        if($request->meta_title !== null){
            $data['title'] = $request->meta_title;
        }
        if($request->meta_keywords !== null){
            $data['keywords'] = $request->meta_keywords;
        }
        if($request->meta_description !== null){
            $data['description'] = $request->meta_description;
        }
        if(DB::table('seos')->where('blog_id',$id)->first() == null){
            $data['blog_id'] = $id;
            DB::table('seos')->insert($data);
        }else{
            DB::table('seos')->where('blog_id', $id)->update($data);
        }
        return back()->with('success', 'Seo Content Added Successfully');
    }

    public function image_upload(Request $request) { 
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $fileName = $request->file('upload')->storeAs('/b-images', $fileName);
            $url = url('storage/' . $fileName); 
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }

    } 

    public function search_blogs(Request $request) {
        $output = [];
        $html = ''; 
        if (!empty($request->keyword)) {
            $output['status'] = 1;
            $data = Blog::where('title', 'like', '%' . $request->keyword . '%')
		->orwhere('short_desc', 'like', '%' . $request->keyword . '%')
		->orwhere('long_desc', 'like', '%' . $request->keyword . '%')
		->get();
        } else {
            $output['status'] = 0;
            $data = Blog::where('show', 1)->orderBy('position', 'asc')->get();
        }
    
        if (!$data->isEmpty()) { 
            foreach ($data as $blogs_key => $blogs_item) {
		if(empty($request->keyword)){
			if($blogs_key > 0){
				$html .= '<div class="col-md-6 col-lg-6">
                    <div class="card blog-box-sty border-0 shadow mb-4">
                    <div class="blog__img"><a href="' . url('blog/' . $blogs_item->slug) . '"><img src="' . url('storage/' . $blogs_item->image) . '" class="w-100" /></a>
                    </div>
                    <div class="card-body">
                        <ul class="d-flex flex-wrap list-unstyled cat-name mb-0">' . get_blog_cat($blogs_item->cat_id) . '</ul>
                        <h4><a href="' . url('blog/' . $blogs_item->slug) . '">' . $blogs_item->title . '</a>
                        </h4>
                        <div class="d-flex justify-content-between mt-3">
                        <div class="blog-writtenby"><strong>By </strong>' . get_writter($blogs_item->created_by) . '</div>
                        <div class="blog-date"><i class="icon-calendar icons"></i> ' . date('M d, Y', strtotime($blogs_item->created_at)) . '</div>
                        </div>
                    </div>
                    </div>
                	</div>';
			}
			
		}else{
                	$html .= '<div class="col-md-6 col-lg-6">
                    <div class="card blog-box-sty border-0 shadow mb-4">
                    <div class="blog__img"><a href="' . url('blog/' . $blogs_item->slug) . '"><img src="' . url('storage/' . $blogs_item->image) . '" class="w-100" /></a>
                    </div>
                    <div class="card-body">
                        <ul class="d-flex flex-wrap list-unstyled cat-name mb-0">' . get_blog_cat($blogs_item->cat_id) . '</ul>
                        <h4><a href="' . url('blog/' . $blogs_item->slug) . '">' . $blogs_item->title . '</a>
                        </h4>
                        <div class="d-flex justify-content-between mt-3">
                        <div class="blog-writtenby"><strong>By </strong>' . get_writter($blogs_item->created_by) . '</div>
                        <div class="blog-date"><i class="icon-calendar icons"></i> ' . date('M d, Y', strtotime($blogs_item->created_at)) . '</div>
                        </div>
                    </div>
                    </div>
                	</div>';
		}
            }
        }else {
            $html = '<h3 class="col-12 text-center text-danger">"'.$request->keyword.'" keyword  Not Found</h3>';
        }
        $output['html'] = $html;
        return response()->json($output);
    }

    public function duplicate_blog($id){ 
        $find = Blog::findorfail($id);
        $new = [];
        if(!empty($find->image)){
            $file_path = explode('/', $find->image);
            $image_ext = explode('.', $file_path[1]); 
            $destination_path = ''; 
            if(!empty($file_path)){
                $destination_path = $file_path[0].'/';
            }
            if(!empty($image_ext)){
                $destination_path .= time(). '.'.$image_ext[count($image_ext)-1];
            }  
            if(Storage::copy($find->image ,$destination_path)){
                $new['image'] = $destination_path;
            }
        }  
        $new['title'] = $find->title;
        $new['slug'] = $find->slug.'-'.Str::random(5);
        $new['short_desc'] = $find->short_desc;
        $new['long_desc'] = $find->long_desc;
        $new['show'] = $find->show;
        $new['cat_id'] = $find->cat_id;
        $new['meta_title'] = $find->meta_title;
        $new['meta_keywords'] = $find->meta_keywords;
        $new['meta_desc'] = $find->meta_desc;
        $new['position'] = get_last_position();
        // $new['created_by'] = Auth::user()->id;
        // $ch = Blog::create($new); 
        // return back()->with('success', 'Copy created successfully!');
        $new['created_by'] = Auth::user()->id;

if(Auth::user()->user_type == 0){
    $new['active'] = 0; // User blog = Pending
}else{
    $new['active'] = 1; // Admin blog = Approved
}

$ch = Blog::create($new);
    }
public function changeStatus($id)
{
    $blog = Blog::findOrFail($id);

    $blog->active = !$blog->active; // toggle 0 <-> 1
    $blog->save();

    return back()->with('success', 'Blog status updated');
}
    
}

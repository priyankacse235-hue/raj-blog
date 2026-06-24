<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Content;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\Template;
use DOMDocument; 
use Illuminate\Support\Facades\DB;

class Front_endController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::join('users', 'users.id', 'blogs.created_by')->join('categories', 'categories.id', 'blogs.cat_id')->where('blogs.active', 1)->where('blogs.is_blocked', 0)->select('blogs.*', 'users.name as writter', 'categories.name as catgeory')->orderBy('blogs.id', 'desc')->get()
        ->map(function ($blog) {
            $blog->comments_count = $blog->comments()->count();
            return $blog;
        });
        // dd($data['blogs']);
        return view('user/index', ['title'=>'Home', 'blogs'=>$data['blogs']]);
    }

    public function about(){  
        return view('user/about');
    }
    
    public function contact(){  
        return view('user/contact');
    }

    
    public function submit_contact(Request $request){
        $data = $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required',
            'company_name'=> 'required',
            'intrest'=> 'required',
            // 'mobile'=> 'required',
        ]);
        Contact::create($data);
        return redirect()->back()->with('success', 'ThankYou. We will contact you soon...!');
    }

    public function all_blogs(){
        $data['categories'] = category::where('status', 1)->get();
        $data['blogs'] = Blog::join('users', 'users.id', 'blogs.created_by')->join('categories', 'categories.id', 'blogs.cat_id')->where('blogs.active', 1)->select('blogs.*', 'users.name as writter', 'categories.name as catgeory')->get(); 
        return view('user/all_blogs', $data);
    }
    
    public function privacy_policy(){
        return view('user/privacy');
    }
    public function terms(){
        return view('user/terms');
    }
    
    public function blog_details($category, $slug){
        $category = urldecode($category);
        $slug = urldecode($slug);
        $cat = Category::where('name', $category)->first();
        if($cat){
            $where = [];
            $where['blogs.cat_id'] = $cat->id;
            $where['blogs.slug'] = $slug;
            // $data['blog'] = Blog::join('users', 'users.id', 'blogs.created_by')
            //     ->join('categories', 'categories.id', 'blogs.cat_id')
            //     ->leftJoin('comments', 'comments.blog_id', 'blogs.id')
            //     ->where($where)
            //     ->select('blogs.*', 'users.name as writter', 'users.profile_photo_path as profile', 'categories.name as catgeory')->first();
$data['blog'] = Blog::join('users', 'users.id', 'blogs.created_by')
    ->join('categories', 'categories.id', 'blogs.cat_id')
    ->leftJoin('comments', 'comments.blog_id', 'blogs.id')
    ->where($where)
    ->select(
        'blogs.*',
        'users.name as writter',
        'users.profile_photo_path as profile',
        'users.bio as bio',   // 👈 YAHI ADD KARO (profile line ke baad)
        'categories.name as catgeory'
    )
    ->first();

            $temp_where = [];
            $temp_where['templates.cat_id'] = $cat->id;
            $temp_where['templates.slug'] = $slug;
            $data['temp'] = Template::join('categories', 'categories.id', 'templates.cat_id')
                ->where($temp_where)
                ->select('templates.*', 'categories.name as catgeory')->first();
            // dd( $data['temp']);
            
            $data['comments'] = [];
            if(!empty($data['blog'])){
                $data['comments'] = Comment::leftJoin('users', 'users.id', 'comments.user_id')
                ->where('blog_id', $data['blog']->id)
                ->select('comments.comment','comments.created_at','users.name as user_name', 'users.profile_photo_path as profile')
                ->orderBy('comments.created_at', 'desc')->limit(5)
                ->get();
                // Count total comments for that blog
                $data['total_comments'] = Comment::where('blog_id', $data['blog']->id)->count();
                return view('user/detailed_view', $data);
            }else if(!empty($data['temp'])){
                $html = $data['temp']['html'];

                $dom = new DOMDocument();
                libxml_use_internal_errors(true); // Ignore HTML warnings
                $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $body = $dom->getElementsByTagName('body')->item(0);

                $safeContent = '';
                if ($body) {
                    // Get all child nodes inside <body>
                    foreach ($body->childNodes as $child) {
                        $safeContent .= $dom->saveHTML($child);
                    }
                } else {
                    $safeContent = $html; // No body found
                }
                // Save into new variable
                $data['temp']['html_without_body'] = $safeContent;
                return view('user/template_view', $data);
            }else{
                return redirect('404');
            }
        }else{
            return redirect('404');
        }
    }

    public function add_view_count(Request $request){
        $slug = $request->slug;
        $blog = Blog::where('slug',$slug)->first();
        if(!empty($blog)){
            $count = $blog->view_count + 1;
            Blog::where('id',$blog->id)->update(['view_count'=>$count]);
        }
        return true;
    }

    public function not_found(){
        return view('user/not_found');
    }

    public function site_map(){
        $blogs = Blog::latest()
            ->where('is_blocked', 0)
            ->where('active', 1)
            ->select('slug', 'id','updated_at','title')
            ->take(5000)
            ->get()
            ->map(function ($blog) {
                $blog->url = make_blog_url($blog->id);
                return $blog;
            });
        return response()->view('user/sitemap', compact('blogs'))->header('Content-Type', 'application/xml');
    }

    public function templates(){
        $categories = DB::table('categories')
        ->orderBy('id', 'desc')
        ->where('delete_status', 0)
        ->where('type', 1)
        ->where('status', 1)
        ->get();

        $temps = Template::join('categories', 'categories.id', '=', 'templates.cat_id')->where('templates.status', 1)
            ->select('templates.title','templates.id','templates.created_at','templates.status', 'categories.name as category_name', 'templates.thumbnail')->limit(10)
            ->get();
        return view('user/templates', ['temps'=>$temps, 'categories'=>$categories]);
    }
}

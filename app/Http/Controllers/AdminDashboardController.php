<?php

namespace App\Http\Controllers;

use App\Models\Genral_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Category;
use App\Models\SpamReport;
use App\Models\Comment;

class AdminDashboardController extends Controller
{
    public function index(){
        $data['category_count'] = Category::where('status',1)->count();
        $data['blogs_count'] = Blog::count();
        $data['active_blog_count'] = Blog::where('active',1)->count();
        $data['users_count'] = User::where('user_type',0)->count();
            $data['comment_count'] = Comment::count();
            $data['pending_blog_count'] = Blog::where('active',0)->count();
$data['total_views'] = Blog::sum('view_count');
   
            
        return view('master/dashboard/dashboard', ['title'=>'Dashboard', 'data'=>$data]);
    }
    
    public function not_found(){
        return view('master/not_found', ['title'=>'Not Found or access denied']);
    }

    public function genral_setting(Request $request){
        if($request->method() == 'POST'){
            $request->validate([
                'site_name' => 'required', 
                'footer' => 'required',
            ]);
            $data = [];
            $setting = DB::table('genral_settings')->first();
            if($request->file('logo') !== null){
                $image_name = time().$request->file('logo')->getClientOriginalName();
                $data['logo'] = $request->file('logo')->storeAs('/sites', $image_name);
                // $data['logo'] = $request->file('logo')->storeAs('sites','logo');
            }
            if($request->file('favicon') !== null){
                $data['favicon'] = $request->file('favicon')->storeAs('sites','favicon');
            }
            $data['site_name'] = $request->site_name;
            $data['footer_text'] = $request->footer;
            if($setting == null){
                if(DB::table('genral_settings')->insert($data)){
                    return back()->with('success', 'Genral Setting Data Submitted');
                }else{
                    return back()->with('error', 'Please Try Later');
                }
            }else{
                if(DB::table('genral_settings')->where('id',$setting->id)->update($data)){
                    return back()->with('success', 'Genral Setting Data Updated');
                }else{
                    return back()->with('error', 'Please Try Later');
                }
            }
        }else{
            $settings = DB::table('genral_settings')->first();
            return view('master/genral_setting/index', ['title'=>'Admin - Site Genral Setting', 'settings'=>$settings]);
        }
    }

    public function all_users(){
        $all_users = DB::table('users')->where('user_type',0)->get();
        return view('master/users/index', ['title'=>'All Users', 'all_users'=>$all_users]);
    }
    
    public function all_contacts(){
        $contacts = Contact::orderBy('id','desc')->limit(10)->get();
        return view('master/contacts/index', ['title'=>'Latest Contacts', 'contacts'=>$contacts]);
    }

    public function contacts_load_more(Request $request){
        $page = $request->page;
        if($page > 0){
            $offset = $page * 10;
            $contacts = Contact::orderBy('id','desc')->offset($offset)->limit(10)->get();
            $sno = $offset + 1;
            return view('master/contacts/load_more', ['contacts'=>$contacts, 'sno'=>$sno]);
        }
    }

    public function user_status($id){
        $user_data = User::where(['user_type'=>0, 'id'=>$id])->first();
        if($user_data !== null){
            if($user_data->active){
                $user_data->active = 0;
            }else{
                $user_data->active = 1;
            }
            $user_data->update();
            return back()->with('success', 'User Status Changed');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function spam_report(){
        $spamReports = DB::table('spam_reports')
        ->join('blogs', 'spam_reports.blog_id', '=', 'blogs.id')
        ->select(
            'spam_reports.url',
            'spam_reports.blog_id',
            'blogs.is_blocked',
            'blogs.activation_request',
            DB::raw("GROUP_CONCAT(spam_reports.reason SEPARATOR ', ') as reasons"),
            DB::raw("COUNT(*) as reason_count")
        )
        ->groupBy('spam_reports.url', 'spam_reports.blog_id', 'blogs.is_blocked', 'blogs.activation_request')
        ->get();
        // dd($spamReports);
        return view('master/spam_report/index', ['title'=>'Blog Spam Reports', 'reports'=>$spamReports]);
    }

    public function blog_block($url){
        // $get_blog = Blog::where('slug',$url)->select('id')->first();
        $get_blog = Blog::where('slug',$url)->first();
        if(!empty($get_blog)){
            $get_blog->is_blocked = 1;
            $get_blog->save();
            return back()->with('success', 'Blog Successfully Blocked');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
    public function unblog_block($url){
        // $get_blog = Blog::where('slug',$url)->select('id')->first();
        $get_blog = Blog::where('slug',$url)->first();
        if(!empty($get_blog)){
            $get_blog->is_blocked = 0;
            $get_blog->save();
            return back()->with('success', 'Blog Successfully Unblocked');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
    public function request_activation($id){
        $blog = Blog::findorfail($id);
        if($blog->is_blocked){
            $blog->activation_request = 1;
            $blog->save();
            return back()->with('error', 'Request submitted for unblocking. Awaiting further action or approval.');
        }else{
            return back()->with('error', 'Something Went Wrong');
        }
    }
    public function changeStatus($id)
{
    $blog = Blog::findOrFail($id);

    if($blog->active == 1){
        $blog->active = 0;
    }else{
        $blog->active = 1;
    }

    $blog->save();

    return back()->with('success', 'Blog status updated successfully');
}
}

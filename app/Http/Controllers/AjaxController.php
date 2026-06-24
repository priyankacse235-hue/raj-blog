<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpamReport;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function change_status(Request $request){
        dd($request->module);
    }

    // report for spam
    public function spam_report(Request $request){
        $data = $request->validate([
            'url' => 'required',
            'blog_id' => 'required',
            'reason' => 'required',
        ]);

        if($request->other_reason != null){
            $data['reason'] = $request->other_reason;
        }
        $data['ip_id'] = auth()->check() ? auth()->id() : request()->ip();
        $find = SpamReport::where('ip_id', $data['ip_id'])
            ->where('blog_id', $data['blog_id'])
            ->first();
        if($find){
            return redirect()->back()->with('error', '👉 "We’ve already received your report for this post. Our team is reviewing it."');
        }else{
            SpamReport::create($data);
            return redirect()->back()->with('success', '👉 "Thank you for your report. We will review it as soon as possible."');
        }
    }

    public function post_comment(Request $request){
        $data = $request->validate([
            'blog_id' => 'required',
            'comment' => 'required',
        ]);
        $data['user_id'] = auth()->check() ? auth()->id() : 0;
        $data['ip_address'] = request()->ip();
        $comment = Comment::create($data);
        if(auth()->check()){
            $comment->profile = !empty(Auth::user()->profile_photo_path) ? Auth::user()->profile_photo_path : '';
            $comment->user_name = Auth::user()->name ?? '';
        }
        // Return rendered HTML from component
        $html = view('components/comments', ['comment' => $comment, 'is_highlight'=>true])->render();

        return response()->json([
            'status' => true,
            'message' => 'Comment posted successfully.',
            'comment' => $html
        ]);
    }

    public function load_comments(Request $request){
        $limit = $request->input('limit', 5);
        $offset = $request->input('offset', 0); // default to 0 if not provided
        $blog_id = $request->input('blog_id');

        if (!$blog_id) {
            return response()->json([
                'status' => false,
                'message' => 'Blog ID is required.',
            ], 400);
        }
        
        $comments = Comment::leftJoin('users', 'users.id', 'comments.user_id')
        ->select('comments.comment','comments.created_at','users.name as user_name', 'users.profile_photo_path as profile')
        ->where('blog_id', $blog_id)
        ->orderBy('comments.created_at', 'desc')->offset($offset)->limit($limit)->get();
        $html = '';
        foreach ($comments as $key => $comment) {
            $html .= view('components.comments', ['comment' => $comment, 'is_highlight'=>true])->render();
        }
        return response()->json([
            'status' => true,
            'message' => 'Comment Loaded Successfully.',
            'comment' => $html
        ]);
    }
}

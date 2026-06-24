<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Console\View\Components\Warn;

class Authenticationcontroller extends Controller
{
    public function login_view(){
        return view('master/login', ['title'=>'Login']);
    }

    public function registration(){
        return view('master/registration', ['title'=>'Registration']);
    }

    public function register_user(Request $request){
        $request->validate([
            'user_name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|min:8',
            'confirm_password'=> 'required|min:8|same:password',
            'terms'=> 'required',
        ]);
        if($request->password == $request->confirm_password && $request->terms == 1){
            $data = [];
            if($request->referral_by !== null){
                $verify_referral = User::where('referral_code',$request->referral_by)->first();
                if($verify_referral == null){
                    return back()->with('error', 'Invalid Refferal Code');
                }
                $data['referred_by'] = $verify_referral->referral_code;
            }
            for ($i=0; $i < 100; $i++) { 
                $referral_code = Str::random(8);
                if(User::where('referral_code',$referral_code)->first() == null){
                    break;
                }else{
                    continue;
                }
            } 
            $data['name'] = $request->user_name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['referral_code'] = $referral_code; 
            $first_offer = Wallet::where(['position'=>'invite','active'=>1])->first();
            $second_offer = Wallet::where(['position'=>'first_blog','active'=>1])->first();
            $offer = [];
            if($first_offer !== null){
                $offer[] = $first_offer->id;
            }
            if($second_offer !== null){
                $offer[] = $second_offer->id;
            } 
            $data['current_offer'] = implode(',', $offer);
            if($ch = User::create($data)){ 
                $tran = [];
                if($first_offer !== null && $first_offer->affer_amount > 0){ 
                    if($first_offer->offer_status == 1){
                        $tran['amount'] = $first_offer->offer_amount;
                    }else{
                        $tran['amount'] = 0;
                    }
                }else{
                    $tran['amount'] = 0;
                }
                if($ch->referred_by != null){
                    $tran['user_id'] = $ch->id;         
                    $tran['referred_by'] = $ch->referred_by;
                    $tran['invitation_status'] = 1;
                    Transaction::insert($tran); 
                    $update_wallet['wallet_amount'] = $tran['amount'];
                    User::where('referral_code', $ch->referred_by)->update($update_wallet); 
                }
                if(!empty($request->redirecturl)){
                    Auth::login($ch);
                    $request->session()->regenerate();
                    return redirect()->to($request->redirecturl . '#writeComment')
                     ->with('success', 'Registration and login successful!');
                }else{
                    return redirect('login')->with('success','User Registered Successfully');
                }
            }else{
                return redirect()->back()->with('error','Please Try Later');
            }
        }else{
            return  redirect()->back()->with('error', 'Password Not Match')->withInput();
        }
    }

    public function auth_login(Request $request){
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 
        $user_data = User::where('email',$request->email)->first(); 
        if($user_data !== null){ 
            $credentials = $request->only('email', 'password'); 
            if ( Auth::attempt($credentials) ){
                if($user_data->active){
                    $request->session()->regenerate();
                    return redirect('admin/dashboard');
                }else{
                    return back()->with('error', 'User is deactivated please contact to admin')->withInput();
                }
            }else{
                return back()->with('error', 'Credetails Match But Somehting went wrong')->withInput();
            }
        }else{
            return back()->with('error', 'User Email Not Found')->withInput();
        }
    }

    public function invite_to_friend($tab_name){
        // dd($tab_name);
        $invite = Wallet::where('position', 'invite')->first(); 
        $first_blog = Wallet::where('position', 'first_blog')->first();  
        $data =  DB::table('users')
            ->join('transactions','transactions.user_id', 'users.id') 
            ->where('transactions.referred_by', Auth::user()->referral_code) 
        ->get();
        return view('master/profile/invite-friend', ['title'=>'Admin - Invite & Earn Reward', 'referals'=>$data, 'invite'=>$invite, 'first_blog'=>$first_blog]);
    }

    public function invite_to_friend_post(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
             'bio'   => 'nullable|string|max:500',
        ]); 

        if($request->profile_photo_path !== null){
            $image_name = time().$request->file('profile_photo_path')->getClientOriginalName();
            $data['profile_photo_path'] = $request->file('profile_photo_path')->storeAs('/profiles', $image_name);
        }
        if(User::where('id', Auth::user()->id)->update($data)){
            return back()->with('success', 'User Details Updated');
        }else{
            return back()->with('error', 'Please Try Letter');
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/');
    }
}

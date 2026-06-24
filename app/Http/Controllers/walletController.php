<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class walletController extends Controller
{ 
    public function index()
    {
        $data_1 = Wallet::where(['position'=>'invite', 'active'=>1])->first();
        $data_2 = Wallet::where(['position'=>'first_blog', 'active'=>1])->first();  
        return view('master/wallet/index', ['title'=>'- Wallet Setting','data_1'=>$data_1, 'data_2'=>$data_2]);
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {   
        $input_data = $request->all(); 
        DB::table('wallets')->update(['active'=>0]);
        $i = 1;
        for ($i=1; $i <= 2; $i++) {   
            $data = [];   
            $data['offer_amount'] = $input_data['offer_amount_'.$i];
            $data['offer_title'] = $input_data['offer_title_'.$i];  
            $data['terms'] = $input_data['terms_'.$i]; 
            $data['position'] = $input_data['position_'.$i];  
            if($check = isset($input_data['offer_status_'.$i])){
                $data['offer_status'] = 1;
            }else{
                $data['offer_status'] = 0;
            }
            Wallet::insert($data); 
        } 
        return back()->with('success', 'Wallet Setting Updated');
    }

    
    public function show(string $id)
    {
        //
    }

     
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}

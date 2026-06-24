<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\link;
use Illuminate\Support\Facades\DB;
class SocailMediaMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::first();
        return view('master/socail_media/index', ['title'=>'Admin - Manage Social Links', 'links'=>$links]);   
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
        $links = link::first();
        $data = $request->all();
        unset($data['_token']);
        if($links == null){
            DB::table('links')->insert($data);
        }else{
            DB::table('links')->where('id',$links->id)->update($data);
        }
        return back()->with('success', 'Links Updated Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

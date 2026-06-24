<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class HappyCustomersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Happy Customers';
        $data['customers'] = Customer::all(); 
        return view('master/customers/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'New Customers'; 
        return view('master/customers/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $new = new Customer();
        if($request->file('profile')){
            $image_name = time().$request->file('profile')->getClientOriginalName();
            $new->profile = $request->file('profile')->storeAs('/customers', $image_name); 
        }
        $new->customer_name = $request->customer_name;
        $new->designation = $request->designation;
        $new->description = $request->description;
        $new->save();
        return redirect('admin/happy-customers')->with('success', 'Customer Added Successfully');
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
        $data['customer'] = Customer::where('id',$id)->first(); 
        $data['title'] = 'Edit Customer'; 
        return view('master/customers/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationRules = [
            'customer_name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ];
        if($request->has('profile') !== null && $request->file('profile')){
            $validationRules['profile'] = 'required|image|mimes:jpeg,png,jpg,gif';
        }
        $request->validate($validationRules);
        $new = Customer::find($id);
        if($request->file('profile')){
            $image_name = time().$request->file('profile')->getClientOriginalName();
            $new->profile = $request->file('profile')->storeAs('/customers', $image_name); 
        }
        $new->customer_name = $request->customer_name;
        $new->designation = $request->designation;
        $new->description = $request->description;
        $new->save();
        return redirect('admin/happy-customers')->with('success', 'Customer Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id); 
        if($customer->profle){
            Storage::delete($customer->profle);
        }
        $customer->delete(); 
        return back()->with('success', 'Blog Post Deleted');
    }
}

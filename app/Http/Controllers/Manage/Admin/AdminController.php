<?php

namespace App\Http\Controllers\Manage\Admin;

use App\DataTables\AdminDatatable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        
        return $admin->render('admin.admins.index',['title'=>'admin Control','id'=>$admin->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create',['title'=>trans('admin.create_admin')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       // Validation rules
       $rules = [
           'name' => 'required|max:65',
           'email' => 'required|email|unique:admins',
           'password' => 'required|min:6|max:34',
       ];

       // Validate admin
       $data = $this->validate(request(),$rules,[],[
           'name' => trans('admin.form_name'),
           'email' => trans('admin.form_email'),
           'password' => trans('admin.form_password'),
       ]);

       // Create new admin
       $data['name'] = request('name');
       $data['email'] = request('email');
       $data['password'] = bcrypt(request('password'));

       Admin::create($data);

       // Session message
       session()->flash('msg',trans('admin.record_added'));
       
       // Redirect back
       return redirect(admin_url('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.edit',compact('admin'),['title'=>trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // Validation rules
       $rules = [
        'name' => 'required|max:65',
        'email' => 'required|email|unique:admins,email,'.$id,
        'password' => 'sometimes|nullable',
    ];

    // Validate admin
    $data = $this->validate(request(),$rules,[],[
        'name' => trans('admin.form_name'),
        'email' => trans('admin.form_email'),
        'password' => trans('admin.form_password'),
    ]);

    // Create new admin
    $data['name'] = request('name');
    $data['email'] = request('email');
    if(request()->has('password')){
        $data['password'] = bcrypt(request('password'));
    }

    // Update Admin data
    Admin::where('id',$id)->update($data);

    // Session message
    session()->flash('msg',trans('admin.record_updated'));
    
    // Redirect back
    return redirect(admin_url('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find admin
        Admin::find($id)->delete();

        // session message
        session()->flash('msg',trans('admin.record_deleted'));
        
        // Redirect back
        return redirect(admin_url('admin'));
    
    }
    
    /**
     * Remove the multi resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function multi_delete()
    {
        // Check if items have multi elements or just one
        if(is_array(request('item'))){
            // If item[] has many destroy all
            Admin::destroy(request('item'));
        } else {
            // If item[] has one Find that element and delete
            Admin::find(request('item'))->delete();
        }
        // Session message for success delete
        Session::flash('msg',trans('admin.record_deleted'));

        // Redirect back to index
        return redirect('admin/admin');
    }
}

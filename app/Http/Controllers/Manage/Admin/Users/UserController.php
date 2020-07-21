<?php

namespace App\Http\Controllers\Manage\Admin\Users;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

     /**
     * Display Users datatable precessed output
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $user){
        return $user->render('admin.users.index',['title'=> trans('admin.users'),'user_id'=>$user->id]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>trans('admin.create_user')]);
    }

    /**
     * Store a newly User
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       // Validation rules
       $rules = [
           'name' => 'required|max:65',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6|max:34',
           'level' => 'required|in:user,company,vendor',
       ];

       // Validate admin
       $data = $this->validate(request(),$rules,[],[
           'name' => trans('admin.form_name'),
           'email' => trans('admin.form_email'),
           'password' => trans('admin.form_password'),
           'level' => trans('admin.level'),
       ]);

       // Create new admin
       $data['name'] = request('name');
       $data['email'] = request('email');
       $data['level'] = request('level');
       $data['password'] = bcrypt(request('password'));

       User::create($data);

       // Session message
       session()->flash('msg',trans('admin.record_added'));

       // Redirect back
       return redirect(admin_url('admin/users'));
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
        $user = User::find($id);
        $title = trans('admin.edit');
        return view('admin.users.edit',compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
       // Validation rules
       $rules = [
        'name' => 'required|max:65',
        'email' => 'required|email|unique:admins,email,'.$id,
        'password' => 'sometimes|nullable',
        'level' => 'required|in:user,company,vendor',
    ];

    // Validate admin
    $data = $this->validate(request(),$rules,[],[
        'name' => trans('admin.form_name'),
        'email' => trans('admin.form_email'),
        'password' => trans('admin.form_password'),
        'level' => trans('admin.level'),
    ]);

    // Create new User
    $data['name'] = request('name');
    $data['email'] = request('email');
    $data['level'] = request('level');
    if(request()->has('password')){
        $data['password'] = bcrypt(request('password'));
    }

    // Update User data
    User::where('id',$id)->update($data);

    // Session message
    session()->flash('msg',trans('admin.record_updated'));

    // Redirect back
    return redirect(admin_url('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find User
        User::find($id)->delete();

        // session message
        session()->flash('msg',trans('admin.record_deleted'));

        // Redirect back
        return redirect(admin_url('users'));

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
            User::destroy(request('item'));
        } else {
            // If item[] has one Find that element and delete
            User::find(request('item'))->delete();
        }
        // Session message for success delete
        Session::flash('msg',trans('admin.record_deleted'));

        // Redirect back to index
        return redirect(admin_url('users'));
    }
}

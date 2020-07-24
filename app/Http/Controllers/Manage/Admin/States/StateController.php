<?php

namespace App\Http\Controllers\Manage\Admin\States;

use App\Http\Controllers\Controller;
use App\DataTables\StateDataTable;
use App\Http\Requests\State\StateRequest;
use App\Models\City;
use App\Models\State;
use Collective\Html\FormFacade as Form;


class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTable $state)
    {
        return $state->render('admin.states.index',['title'=>trans('admin.states'),'id'=>$state->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = new State();

    // $this->countryAndCityData();
    if(request()->ajax()){
        if(request()->has('country_id')){
            // Find select data
            $select = request()->has('select') ? request('select'): '';
            return Form::select('country_id',
            City::cityNameWithCountry(),
                         $select,
                         ['class' =>'form-control', 'auto-focus'=>'true',
                         'placeholder' =>'........................']);


        }
    }
        return view('admin.states.create',[
            'title'=>trans('admin.create_state'),
            'state'=>$state,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request )
    {


       // Validate admin
       $data = $this->validate($request,$request->rules(),[],$this->messages());

        // Create new state
       State::create($data);

       // Session message
       $this->session_flash('admin.record_added');
       // Redirect back
       return redirect(admin_url('states'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('admin.states.edit',compact('state'),['title'=>trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request , State  $state)
    {

        // Validate admin
    $data = $this->validate($request,
        $request->rules(),
        [],$this->messages());

    // Update state data
    State::where('id',$state->id)->update($data);

    // Session message
    $this->session_flash('admin.record_updated');

    // Redirect back
    return redirect(admin_url('states'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
      // Delete state data
      $this->deleteState($state->id);
      $this->session_flash('admin.record_deleted');
      return redirect(admin_url('states'));
    }


   /*********************  Custom Functions ************************************ */
    /**
     * Remove the multi resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function multi_delete()
    {
        // Check if items have multi elements or just one
        if(is_array(request('item'))){
          foreach(request('item') as $id){
            $this->deleteState($id);
          }
        } else {
            $this->deleteState(request('item'));
        }
        // Session message for success delete
        $this->session_flash('admin.record_deleted');
        // Redirect back to index
        return redirect(admin_url('states'));
    }


    /**
     *  Delete state data
     *
     * @param mixed $id
     * @return void
     */
    protected function deleteState($id){
        State::find($id)->delete();
    }

    /**
     *  Validation messages
     *
     * @return array
     */
    protected function messages(){
      return [
        'state_name_ar' => trans('admin.state_name_ar'),
        'state_name_en' => trans('admin.state_name_en'),
        'city_id' => trans('admin.city_id'),
        'country_id' => trans('admin.country_id'),
      ];
    }

    /**
     *  Session messages
     *
     * @param string|null $msg
     * @return string
     */
    protected function session_flash($msg){
      return session()->flash('msg',trans($msg));
    }


    /**
     *  Find country and city related data
     * @return response
     */
    protected function countryAndCityData(){
             // If her is ajax request and and has country_id reuest then display form html with selected city

    }
}

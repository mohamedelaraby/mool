<?php

namespace App\Http\Controllers\Manage\Admin\Countries;

use App\Http\Controllers\Controller;
use App\DataTables\CityDataTable;
use App\Http\Requests\City\CityRequest;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDataTable $city)
    {
        return $city->render('admin.cities.index',['title'=>trans('admin.cities'),'id'=>$city->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();
        return view('admin.cities.create',[
            'title'=>trans('admin.create_city'),
            'city'=>$city,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $cityRequest )
    {


       // Validate admin
       $data = $this->validate($cityRequest,$cityRequest->rules(),[],$this->messages());

        // Create new city
       City::create($data);

       // Session message
       $this->session_flash('admin.record_added');


       // Redirect back
       return redirect(admin_url('city'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.cities.edit',compact('city'),['title'=>trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $cityRequest , $id)
    {
            // Validate admin
            $data = $this->validate($cityRequest,
            $cityRequest->rules(),
            [],$this->messages());



    // Update city data
    City::where('id',$id)->update($data);

    // Session message
    $this->session_flash('admin.record_updated');

    // Redirect back
    return redirect(admin_url('cities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Delete city data
      $this->deleteCity($id);
      $this->session_flash('admin.record_deleted');
      return redirect(admin_url('cities'));
    }


   /*********************  Custom Functions ************************************ */
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
          foreach(request('item') as $id){
            $this->deleteCity($id);
          }
        } else {
            $this->deleteCity(request('item'));
        }
        // Session message for success delete
        $this->session_flash('admin.record_deleted');
        // Redirect back to index
        return redirect(admin_url('cities'));
    }


    /**
     *  Delete city data
     *
     * @param mixed $id
     * @return void
     */
    protected function deleteCity($id){
        $city = City::find($id);
        Storage::delete($city->logo);
        $city->delete();
    }

    /**
     *  Validation messages
     *
     * @return array
     */
    protected function messages(){
      return [
        'city_name_ar' => trans('admin.city_name_ar'),
        'city_name_en' => trans('admin.city_name_en'),
        'country_id' => trans('admin.country_id'),
      ];
    }

    /**
     *  Session messages
     *
     *  @param string|null $msg
     * @return string
     */
    protected function session_flash($msg){
      return session()->flash('msg',trans($msg));
    }


}

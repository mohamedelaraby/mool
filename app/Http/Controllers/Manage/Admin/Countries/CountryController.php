<?php

namespace App\Http\Controllers\Manage\Admin\Countries;

use App\Http\Controllers\Controller;
use App\DataTables\CountryDataTable;
use App\Http\Requests\Country\CountryRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTable $country)
    {

        return $country->render('admin.countries.index',['title'=>trans('admin.countries'),'id'=>$country->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = new Country();
        return view('admin.countries.create',[
            'title'=>trans('admin.create_country'),
            'country'=>$country,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $countryRequest )
    {


       // Validate admin
       $data = $this->validate($countryRequest,$countryRequest->rules(),[],[
           'country_name_ar' => trans('admin.country_name_ar'),
           'country_name_en' => trans('admin.country_name_en'),
           'mobile' => trans('admin.mobile'),
           'code' => trans('admin.code'),
           'logo' => trans('admin.logo'),
       ]);

            // If request has logo if then upload
            if(request()->hasFile('logo')){
                $data['logo'] = up()->upload([
                    'file_name' => 'logo',
                    'path' => 'countries',
                    'upload_type' => 'single',
                    'delete_file' => '',
                ]);
            }

        // Create new Country
       Country::create($data);

       // Session message
       session()->flash('msg',trans('admin.record_added'));

       // Redirect back
       return redirect(admin_url('countries'));
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
        $country = Country::find($id);
        return view('admin.countries.edit',compact('country'),['title'=>trans('admin.edit')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $countryRequest , $id)
    {
            // Validate admin
            $data = $this->validate($countryRequest,
            $countryRequest->rules(),
            [],[
                'country_name_ar' => trans('admin.country_name_ar'),
                'country_name_en' => trans('admin.country_name_en'),
                'mobile' => trans('admin.mobile'),
                'code' => trans('admin.code'),
                'logo' => trans('admin.logo'),
            ]);

                 // If request has logo if then upload
                 if(request()->hasFile('logo')){
                     $data['logo'] = up()->upload([
                         'file_name' => 'logo',
                         'path' => 'countries',
                         'upload_type' => 'single',
                         'delete_file' => Country::find($id)->logo,
                     ]);
                 }

    // Update Country data
    Country::where('id',$id)->update($data);

    // Session message
    session()->flash('msg',trans('admin.record_updated'));

    // Redirect back
    return redirect(admin_url('countries'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Delete country data
      $this->deleteCountry($id);
        session()->flash('msg',trans('admin.record_deleted'));
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
          foreach(request('item') as $id){
            $this->deleteCountry($id);
          }
        } else {
            $this->deleteCountry(request('item'));
        }
        // Session message for success delete
        Session::flash('msg',trans('admin.record_deleted'));

        // Redirect back to index
        return redirect(admin_url('countries'));
    }


    /**
     *  Delete Country data
     *
     * @param mixed $id
     * @return void
     */
    protected function deleteCountry($id){
        $country = Country::find($id)->delete();
        Storage::delete($country->logo);
        $country->delete();
    }


}

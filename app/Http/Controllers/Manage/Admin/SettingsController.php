<?php

namespace App\Http\Controllers\Manage\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

;

class SettingsController extends Controller
{
    /**
     *  Display settings
     *  @return view
     */
    public function settings(){
        return view('admin.settings',['title'=>trans('admin.settings')]);
    }


    /**
     *  Save settings
     *  @return view
     */
    public function settings_save(){

        // Validate income request
        $data = $this->validate(request(),[
             'logo'=>validate_image(),
             'icon'=>validate_image(),
            ],
            [],
            [
             'logo'=>trans('admin.logo'),
             'icon'=>trans('admin.icon'),]);

        // If request has logo if then upload
        if(request()->hasFile('logo')){
            $data['logo'] = up()->upload([
                'file_name' => 'logo',
                'path' => 'settings',
                'upload_type' => 'single',
                'delete_file' => settings()->logo,
            ]);
        } 

        // Upload Icon image
        if( request()->hasFile('icon')){
            $data['icon'] = up()->upload([
                    'file_name' =>'icon',
                    'path' =>'settings',
                    'upload_type' =>'single',
                    'delete_file' =>settings()->icon,
            ]);
        }


        // order data by id and description then update settings
        Settings::orderBy('id','desc')->update($data);
        // session success message
        session()->flash('msg',trans('admin.record_updated'));
        // redirect to settings page
        return redirect(admin_url('settings'));
    }
}

<?php

use App\Models\Settings;
use Illuminate\Support\Facades\Request;
 /**
 *  Handle admin url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/'  . $url);
    }
}

/**
 *  Get UploadController location
 *  @return mixed
 */
if (!function_exists('up')) {
    function up()
    {
        return new \App\Http\Controllers\UploadController;
    }
}

/**
 *  Get last settings record
 *  @return Response
 */
if (!function_exists('settings')) {
    function settings()
    {
        return Settings::orderBy('id', 'desc')->first();
    }
}
 /**
 *  Get App locale langl
 *  @return session
 */
if (!function_exists('lang')) {
    function lang()
    {
        if(session()->has('lang')){
            return session('lang');
        } else {
            return settings()->main_lang;
        }

    }
}

 //[[[[[[[   UI Helper Functions  ]]]]]]]
/**
 *  Handle adminLTE design url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('admin_ui')) {
    function admin_ui($url = null)
    {
        return url('/design/admin/' . $url);
    }
}

/**
 *  Handle UI design url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('ui_url')) {
    function ui_url($url = null)
    {
        return url('/design/front/' . $url);
    }
}

/**
 *  Handle sidebar menu display
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('active_menu')) {
   function active_menu($link){
       if(preg_match('/'.$link.'/i', Request::segment(2))){
           return ['menu-open','display:block'];
       } else {
           return ['',''];
       }

   }
}

/**
 *  Handle sidebar menu arrows icon
 *
 *  @return string
 */
if (!function_exists('arrow_icon')) {
   function arrow_icon(){
    if(app()->getlocale() == 'ar'){
      return  'right fas fa-angle-left';
    }else{
        return "right fas fa-angle-right";
    }

   }
}

/**
 *  Handle navbar direction
 *
 *  @return string
 */
if (!function_exists('nav_direction')) {
   function nav_direction(){
    if(app()->getlocale() == 'ar'){
      return  'mr-auto';
    }else{
        return "ml-auto";
    }

   }
}

 //[[[[[[[   UI Helper Functions  ]]]]]]]



/**
 *  Handle admin Auth guard prefix
 *
 *  @return guard
 */
if (!function_exists('adminAuthGuard')) {
    function adminAuthGuard()
    {
        return auth()->guard('admin');
    }
}

/**
 *  Handle admin Datatable data
 *
 *  @return array | mix
 */
if (!function_exists('datatable_lang')) {
    function datatable_lang()
    {
        return[
        "sProcessing" => trans('admin.sProcessing'),
        "sLengthMenu" => trans('admin.sLengthMenu'),
        "sZeroRecords" => trans('admin.sZeroRecords'),
        "sEmptyTable" => trans('admin.sEmptyTable'),
                "sInfo" => trans('admin.sInfo'),
            "sInfoEmpty" => trans('admin.sInfoEmpty'),
        "sInfoFiltered" => trans('admin.sInfoFiltered'),
        "sInfoPostFix" => trans('admin.sInfoPostFix'),
            "sSearch" => trans('admin.sSearch'),
                "sUrl" => trans('admin.sUrl'),
        "sInfoThousands" => trans('admin.sInfoThousands'),
    "sLoadingRecords" => trans('admin.sLoadingRecords'),
            "oPaginate" => [
                "sFirst" => trans('admin.sFirst'),
                "sLast" => trans('admin.sLast'),
                "sNext" => trans('admin.sNext'),
            "sPrevious" => trans('admin.sPrevious')
            ],
            "oAria" =>[
            "sSortAscending" => trans('admin.sSortAscending'),
            "sSortDescending" => trans('admin.sSortDescending')
            ]
            ];
    }
}





//[[[[[[[[ Validate Helper Functions]]]]]]]]

/**
 *  Validate incoming Images Requests
 *  @param mixed|null $extension
 *  @return Response
 */
if(!function_exists('validate_image')){
    function validate_image($extension=null){
        // If  no extension Then match image extension
        if($extension === null){
            return  'image|required|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048';
        } else {
            // Use Image extension
            return 'image|required|mimes:'.$extension;
        }
    }
}


//[[[[[[[[ Validate Helper Functions]]]]]]]]




?>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{


    // status
   const OPEN_STATUS  = 'open';
   const CLOSE_STATUS  = 'close';

   // Lang
   const AR_LANG  = 'ar';
   const EN_LANG  = 'en';

    /**
     *  Table name
     */
    protected $table='settings';

     /**
     *  mass assignment columns
     */

     protected $fillable =[
         'sitename_ar',
         'sitename_en',
         'logo',
         'icon',
         'email',
         'description',
         'keywords',
         'status',
         'message_maintanance',
         'main_lang',
     ];
}

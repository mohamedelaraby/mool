<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     *  Table name
     * @return string
     */
    protected $table = 'cities';

    /**
     *  Guarded attributes
     *  @return array
     */
    protected $guarded = [];

    /**
     *  Get Country of the city
     *  @return response
     */
    public function country_id(){
        return $this->hasOne(Country::class,'id','country_id');
    }

    /**
     *  Get Country of the city
     *  @return response
     */
    public function ScopeCityNameWithCountry(){
        return $this->where('country_id',request('country_id'))->pluck('city_name_'.app()->getLocale(),'id');

    }
}

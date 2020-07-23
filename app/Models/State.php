<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     /**
     *  Table name
     * @return string
     */
    protected $table = 'states';

    /**
     *  Guarded attributes
     *  @return array
     */
    protected $guarded = [];

    /**
     *  Get Country of the city state
     *  @return response
     */
    public function country_id(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    /**
     *  Get City of state
     *  @return response
     */
    public function city_id(){
        return $this->hasOne(City::class,'id','city_id');
    }

    //////////////////////////// Local Scopes ////////////////////////////////////////////////////
    /**
     *  Get city and country
     *  @return response
     */
    public function scopeGetCountryAndCity(){
        return $this->query()->with('country_id')->with('city_id')->select('states.*');
    }
}

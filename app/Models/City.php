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
}

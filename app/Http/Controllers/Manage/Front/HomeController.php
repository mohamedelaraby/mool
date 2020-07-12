<?php

namespace App\Http\Controllers\Manage\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     *  Display Home page
     *
     * @return response
     */
    public function index(){
        return view('front.home');
    }
}

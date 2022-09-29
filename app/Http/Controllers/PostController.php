<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //


    public function create()
    {
        //$channel =Channel::orderBy('name')->get();
        return view('post');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{


    public function index()
    {
        // $channel=Channel::all();
        return view('Channel');
    }


    //
}

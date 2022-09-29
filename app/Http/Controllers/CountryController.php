<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    //


    public function index()
    {
        $country=DB::Table('countries')->get();
        //dd($country);
        return view('Jquery.country',compact('country'));
    }

    public function getstate(Request $request)
    {
        $country=$request->cid;
        $state=DB::Table('states')->where('country_id',$country)->get();
        $html="<option></option>";
        foreach($state as $states)
        {
            $html.="<option value='$states->id'>".$states->name."</option>";
        }
        echo $html;
    }
    public function getcity(Request $request)
    {
        $state=$request->state_id;
        //echo $state;
        $city=DB::Table('cities')->where('state_id',$state)->get();
        $html="<option></option>";
        foreach($city as $cities)
        {
            $html.="<option value='$cities->id'>".$cities->name."</option>";
        }
        echo $html;
    }
}

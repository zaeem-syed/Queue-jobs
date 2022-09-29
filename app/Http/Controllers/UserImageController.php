<?php

namespace App\Http\Controllers;

use Share;
use App\Helper\Helper;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class UserImageController extends Controller
{
    //

    public function insert()
    {
        return view('index');
    }


    public function Store(Request $request)
    {
        if($request->hasfile('image'))
        {

            $file=$request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $ext=$file->getClientOriginalExtension();
            $imgname=uniqid().$filename;
            $destinationpath=public_path('user_images');
            $file->move($destinationpath,$imgname);
     }
             DB::table('user_images')->insert([
                'contest_id' => 1,
                'user_id' => auth()->user()->id,
                'image_path'=> $imgname,
                'unique_upload_id' => rand(2,50),

             ]);
    }

    public function showimage()
    {


        $data=DB::Table('user_images')->first();

        $like=DB::table('user_images')->where('id',$data->id)->where('user_like','yes')->count();
        $dislike=DB::table('user_images')->where('id',$data->id)->where('user_like','no')->count();
        // dd($like,$dislike);

        $review_id=DB::Table('user_reviews')->where('user_images_id',$data->id)->pluck('id')->first();
        $contest_id=DB::Table('user_images')->where('user_id',$data->id)->pluck('contest_id');

        $review_category=DB::Table('review_category')->where('contest_id',$contest_id)->pluck('id');
        //dd($review_category);

       foreach($review_category as $key=>$review)
       {
        //dd($review,$contest_id['0']);
        if($key==0)
        {
            $avgsmell=Helper::Smell($contest_id['0'],$review);
        }
        if($key==1)
        {
            $avgslooks=Helper::Looks($contest_id['0'],$review);

        }

       }

         $total=$avgslooks+$avgsmell;
         $total=$total/2;
        //  $post->url,
        //  $post->title,
        // dear sir here we have to provide the link and title of the post
        //
         $socialShare = \Share::page(
            $data->id,
            $data->contest_id,
        )
            ->facebook()
            ->twitter()
            ->reddit()
            ->linkedin()
            ->whatsapp()
            ->telegram();


        //dd($data);
        return view('showimage',compact('data','avgsmell','avgslooks','total','like','dislike','socialShare'));
    }

    public function reviews(Request $request)
        {
            //  dd($request->smell);
            $smell=$request->smell;
            $looks=$request->looks;

            //dd($smell,$looks);

           DB::table('user_reviews')->insert([
            'user_id' => auth()->user()->id,
            'user_images_id' => $request->user_id,
            'review_comments' => $request->comment,
            'created_at' => Carbon::now(),

          ]);

          $contest=DB::Table('user_images')->where('user_id',$request->user_id)->pluck('contest_id');
          $reviewcategory=DB::Table('review_category')->where('contest_id',$contest)->pluck('id');
          $user_review_id=DB::table('user_images')->where('id',$contest)->pluck('id');
          //dd($user_review_id['0']);
          //dd($reviewcategory);
          foreach($reviewcategory as $key=> $review)
          {

            if($key==0)
            {
                DB::Table('all_category_review')->insert([
                    'user_review_id' => $user_review_id['0'],
                    'category_id' => $review,
                    'review'   => $smell,

                ]);

            }

            if($key==1)
            {
                DB::Table('all_category_review')->insert([
                    'user_review_id' => $user_review_id['0'],
                    'category_id' => $review,
                    'review'   => $looks,

                ]);
            }



          }
         return redirect()->back();



    }

    public function like(Request $request){
                $id=$request->post;

                $find=DB::Table('user_images')->where('id',$id)->first();
                if($request->type=='like')
                {
                    $data='yes';
                }
                else{
                    $data="No";
                }
                DB::Table('user_images')->where('id',$id)->update(['user_like' => $data]);
                return response()->json([
                    'bool'=>true
                ]);
    }



    public function collection ()
    {
        $data=['1','2','3','4','5'];
        $collect=collect($data);
        //dd($collect->avg());


        $data1=['amber','tooba',"umehani",null,""];

        $collection=collect($data1)->map(function($name){
            return strtoupper($name);
        })->reject(function($name){
            return empty($name);
        });

        dd($collection);

    }


    public function vote()
    {
        return view('vote');
    }


    public function CastVote(Request $request)
    {
        //


      try{

        DB::transaction(function() use($request){

        DB::Table('votes')->insert([
            "party_name" => $request->party
        ]);
        $party=DB::table('party')->where('name',$request->party)->first();
        $findvoter=DB::table("voter")->where('name',$request->name)->where('id_card',$request->id_card)->first();
        //dd($party->name);
        if(is_null($party))
        {
            throw new Exception("unknown party");

        }
        if(is_null($findvoter))
        {
            throw new Exception("Voter is not present");
        }
        else{
            DB::Table('party_votes')->insert([
                "party_name" => $party->name,
                 "vote_count" => 1
            ]);
        }




        });
    }
    catch(Exception $e)
    {
        return back()->withError($e->getMessage())->withInput();
    }


    }


}

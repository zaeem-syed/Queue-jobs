<?php // Code within app\Helpers\Helper.php

namespace App\Helper;
use Illuminate\Support\Facades\DB;
// use App\siteContent;
use Auth;
class Helper
{
    public static function Smell($id,$categoryid)
    {
        // $sum=DB::table('all_category_review')->where('user_review_id',2)->where('category_id',$categoryid)->sum('review');
        // dd($sum);
        $sum=DB::table('all_category_review')->where('user_review_id',$id)->where('category_id',$categoryid)->sum('review');
        $total=DB::table('all_category_review')->where('user_review_id',$id)->where('category_id',$categoryid)->count('review');
        //dd($sum,$total);
        $avg=$sum/$total;
        // dd($avg);
        return $avg;
    }

    public static function Looks($id,$categoryid)
    {
        $sum=DB::table('all_category_review')->where('user_review_id',$id)->where('category_id',$categoryid)->sum('review');
        $total=DB::table('all_category_review')->where('user_review_id',$id)->where('category_id',$categoryid)->count('review');
        $avg=$sum/$total;
        return $avg;
    }


}

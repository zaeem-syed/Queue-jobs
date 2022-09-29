<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         * {
         box-sizing: border-box;
         }
         /* Add a gray background color with some padding */
         body {
         font-family: Arial;
         padding: 20px;
         background: #f1f1f1;
         }
         /* Header/Blog Title */
         .header {
         padding: 30px;
         font-size: 40px;
         text-align: center;
         background: white;
         }
         /* Create two unequal columns that floats next to each other */
         /* Left column */
         .leftcolumn {
         float: left;
         width: 75%;
         }
         /* Right column */
         .rightcolumn {
         float: left;
         width: 25%;
         padding-left: 20px;
         }
         /* Fake image */
         .fakeimg {
         background-color: #aaa;
         width: 100%;
         padding: 20px;
         }
         /* Add a card effect for articles */
         .card {
         background-color: white;
         padding: 20px;
         margin-top: 20px;
         }
         /* Clear floats after the columns */
         .row:after {
         content: "";
         display: table;
         clear: both;
         }
         .avatar {
         vertical-align: middle;
         width: 50px;
         height: 50px;
         border-radius: 50%;
         }
         .rate1 {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate1:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate1:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate1:not(:checked) > label:before {
         content: '★ ';
         }
         .rate1 > input:checked ~ label {
         color: #ffc700;
         }
         .rate1:not(:checked) > label:hover,
         .rate1:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate1 > input:checked + label:hover,
         .rate1 > input:checked + label:hover ~ label,
         .rate1 > input:checked ~ label:hover,
         .rate1 > input:checked ~ label:hover ~ label,
         .rate1 > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .socialShare>*{
    display: inline;
         }
         .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }

         .socially {
          writing-mode: vertical-lr;
          margin: 0px auto;
}
.socially li ::marker {
          display: none;
}

         /* End */
      </style>
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
                  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
                  <script src="public/dist/rating.js"></script>
   </head>
   <body>
      <div class="header">
         <h2>Image Review .</h2>
      </div>
      <div class="row">
         <div class="leftcolumn">
            <div class="card">
               {{-- <h2 style="color:#0071a1;">{{ $post_detail->title }}</h2>
               <p style="color:#e91e63;">Published at : {{$post_detail->created_at->format('jS \\of F Y') }}</p>
               <p>{{ $post_detail->description }}</p>
               <hr> --}}
               <!-- Display review section start -->
               {{-- <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                  <div>
                     <div class="row mt-5">
                        <h4>Comment Section :</h4>
                        <div class="col-sm-12 mt-5">
                           @foreach($post_detail->ReviewData as $review)
                           <div class=" review-content">
                              <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar ">
                              <span class="font-weight-bold ml-2">{{$review->name}}</span>
                              <p class="mt-1">
                                 @for($i=1; $i<=$review->star_rating; $i++)
                                 <span><i class="fa fa-star text-warning"></i></span>
                                 @endfor
                                 <span class="font ml-2">{{$review->email}}</span>
                              </p>
                              <p class="description ">
                                 {{$review->comments}}
                              </p>
                           </div>
                           <hr>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div> --}}
               <!-- Review store Section -->
               <div class="container">
                  <div class="row">
                     <div class="col-sm-10 mt-4 ">
                        {{-- @foreach($data as $datas) --}}
                        <form class="py-2 px-4" action="/reviews" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                           @csrf

                           <input type="hidden" name="user_id" value="{{$data->user_id}}">
                           <div class="row justify-content-end mb-1">
                              <div class="col-sm-8 float-right">
                                 {{-- @if(Session::has('flash_msg_success')) --}}
                                 <div class="alert alert-success alert-dismissible p-2">
                                    {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> {!! session('flash_msg_success')!!}. --}}
                                 </div>
                                 {{-- @endif --}}
                              </div>
                           </div>
                           {{-- @php
                            dd($data);
                           @endphp --}}

                           <p class="font-weight-bold ">Review</p>
                           <img src="{{url('../user_images',$data->image_path)}}" alt=""  height="123px;" width="123px;">
                           {{-- <div class="form-group row">
                              <div class=" col-sm-6">
                                 <input class="form-control" type="text" name="name" placeholder="Name" maxlength="40" required/>
                              </div>
                              <div class="col-sm-6">
                                 <input class="form-control" type="email" name="email" placeholder="Email" maxlength="80" required/>
                              </div>
                           </div> --}}
                           <div class="form-group row">
                              {{-- <div class="col-sm-6">
                                 <input class="form-control" type="text" name="phone" placeholder="Phone" maxlength="40" required/>
                              </div> --}}
                              <div class="col-sm-6">
                                <p>Smell</p>
                              @php
                            $avg = $avgsmell;
                            $arr = explode('.',$avg);
                             $first = $arr[0];
                              $decimal_value = $arr[1];
                              @endphp
                               {{-- <div id="halfstarsReview"></div> --}}

                               {{-- <div id="halfstarsReview" rating="true" style="color: rgb(252, 215, 3);"> --}}

          <p>Average Smell Rating @php  echo round($avg,2);@endphp </p>
           <?php
           $remaining = 5-$first;
           for($i=1;$i<=$first;$i++){
           ?>

           <i class="fas fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>

           <?php

           }

           if($decimal_value>0){
               $remaining = 5-($first+1);
           ?>
           <i class="fas fa-star-half-alt" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>
           <?php
           }

           for($i=1;$i<=$remaining;$i++){

           ?>
           <i class="far fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>


           <?php

           }


            ?>

                               {{-- </div>


                           </div> --}}

                                 <div class="rate">
                                    <input type="radio" id="star5" class="rate" name="smell" value="5"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio"  id="star4" class="rate" name="smell" value="4"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" name="smell" value="3"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" name="smell" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" name="smell" value="1"/>
                                    <label for="star1" title="text">1 star</label>
                                 </div>
                              </div>
                              <div class="col-sm-6"></div>
                              <div class="col-sm-6">

                                <p>Looks</p>
                                @php
                                $avglook = $avgslooks;
                                $arr = explode('.',$avglook);
                                 $second = $arr[0];
                                  $decimal_value1 = $arr[1];
                                  @endphp
            <p>Average Looks  Rating @php  echo round($avglook,2);@endphp </p>
           <?php
           $remaininglook = 5-$second;
           for($i=1;$i<=$second;$i++){
           ?>

           <i class="fas fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>

           <?php

           }

           if($remaininglook>0){
            $remaininglook = 5-($second+1);
           ?>
           <i class="fas fa-star-half-alt" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>
           <?php
           }

           for($i=1;$i<=$remaininglook;$i++){

           ?>
           <i class="far fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>


           <?php

           }


            ?>
                                <div class="rate1">
                                   <input type="radio" id="stars5" class="rate1" name="looks" value="5"/>
                                   <label for="stars5" title="text">5 stars</label>
                                   <input type="radio"  id="stars4" class="rate1" name="looks" value="4"/>
                                   <label for="stars4" title="text">4 stars</label>
                                   <input type="radio" id="stars3" class="rate1" name="looks" value="3"/>
                                   <label for="stars3" title="text">3 stars</label>
                                   <input type="radio" id="stars2" class="rate1" name="looks" value="2">
                                   <label for="stars2" title="text">2 stars</label>
                                   <input type="radio" id="stars1" class="rate1" name="looks" value="1"/>
                                   <label for="stars1" title="text">1 star</label>
                                </div>
                             </div>
                           </div>
                           <div class="form-group row mt-4">
                           {{-- <p>Total Rating </p> --}}
                           @php
                           $totalrating = $total;
                           $arr = explode('.',$totalrating);
                            $third = $arr[0];
                             $decimal_value2 = $arr[1];
                             @endphp
        <p>Average Total Rating  @php  echo round($totalrating,2);@endphp </p>
      <?php
      $remainingtotal = 5-$third;
      for($i=1;$i<=$third;$i++){
      ?>

      <i class="fas fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>

      <?php

      }

      if( $remainingtotal>0){
        $remainingtotal = 5-($third+1);
      ?>
      <i class="fas fa-star-half-alt" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>
      <?php
      }

      for($i=1;$i<=$remainingtotal;$i++){

      ?>
      <i class="far fa-star" style="cursor: pointer; width: 36px; color: rgb(252, 215, 3);"></i>


      <?php

      }


       ?>
       {{-- @php
        dd($data->id);
       @endphp --}}
                              <div class="col-sm-12 ">
                                 <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200" id="txtEditor"></textarea>
                                 <h5 class="card-header">
                                    <span class="comment-count btn btn-sm btn-outline-info"></span>
                                    <small class="float-right">
                                        <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{$data->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                                            Like @php
                                                if(isset($like))
                                                {
                                                    echo $like;
                                                }
                                            @endphp
                                            <span class="like-count"></span>
                                        </span>
                                        <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-type="dislike" data-post="{{$data->id}}" class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
                                            Dislike
                                            @php
                                            if(isset($dislike))
                                            {
                                                echo $dislike;
                                            }
                                        @endphp
                                            <span class="dislike-count"></span>
                                        </span>
                                    </small>
                                    </h5>
                                </div>
                           </div>
                           <div class="mt-3 ">
                              <button class="btn btn-sm py-2 px-3 btn-info">Submit
                              </button>
                           </div>
                        </form>
                        {{-- @endforeach --}}
                        <div class="socially" >
                        {!! $socialShare !!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="rightcolumn">
            <div class="card">
                         <img class="fakeimg" style="height:100px;" src="https://8bityard.com/ezoimgfmt/mllibnjakigh.i.optimole.com/e4PqOHU-NUmggukx/w:110/h:48/q:auto/https://8bityard.com/wp-content/uploads/2020/05/cropped-cropped-LogoMakr_48yknb-2.png?ezimgfmt=rs:110x48/rscb1/ng:webp/ngcb1">

            </div>
         </div>
      </div>
      <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      $('.basetest').click(function(event) {
    /* Act on the event */

      $("#imgupload").val($("#preview").attr('src'));
  });
     $(".checkers").mouseover(function(){
      if(parseInt($(".quiz_percent").val()) + parseInt($(".test_percent").val()) + parseInt($(".assignment_percent").val()) != 100){
        // alert('Sum of Quizzes, Tests and Assignments must be equal to 100 %');
      }
    });

CKEDITOR.replace( 'txtEditor' );
    </script>
    <script>

        $("#halfstarsReview").rating({
            "half": true,
            "click": function (e) {
                console.log(e);
                $("#halfstarsInput").val(e.stars);
            }
        });


    </script>
    <script>
        $(document).on('click','#saveLikeDislike',function(){
    var _post=$(this).data('post');
    var _type=$(this).data('type');
    var vm=$(this);


    // Run Ajax
    $.ajax({
        url:"/like",
        type:"post",
        dataType:'json',
        data:{
            post:_post,
            type:_type,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.addClass('disabled');
        },
        success:function(res){
            if(res.bool==true){
                vm.removeClass('disabled').addClass('active');
                vm.removeAttr('id');
                var _prevCount=$("."+_type+"-count").text();
                _prevCount++;
                $("."+_type+"-count").text(_prevCount);
            }
        }
    });
});
    </script>
   </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country State and city </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

  <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">Select Country State or City</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Select Country</label>
                            <select name=""  class="form-control" id="country">
                            @foreach($country as $countries)
                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select State</label>
                            <select name="" id="state" class="form-control">
                            <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select City</label>
                            <select name="" id="city" class="form-control">
                            <option value=""></option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>


  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#country').change(function(){
        var cid=$(this).val();
        $.ajax({
            url:'/getstate',
            type: 'post',
            data: 'cid='+cid+'&_token={{csrf_token()}}',
            success:function(result){
                $('#state').html(result)
            }
        })
    });
    $('#state').change(function(){
        var state_id=$(this).val();
        $.ajax({
            url:'/getcity',
            type: 'post',
            data: 'state_id='+state_id+'&_token={{csrf_token()}}',
            success:function(result){
                $('#city').html(result)
            }
        })
    });

});
</script>

</body>
</html>

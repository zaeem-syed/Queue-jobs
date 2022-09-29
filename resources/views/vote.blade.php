<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Please CAste Your vote</title>
</head>
<body>

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <form action="/vote" method="POST">
        @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="">
    </div>
    <div class="form-group">
        <label for="">Id Card</label>
        <input type="number" name="id_card" id="">
    </div>
    <div class="form-group">
        <label for="">Party Name</label>
         @php
         $party=DB::table('party')->get();

         @endphp
         <select name="party" id="">
            @foreach($party as $parties)
            <option value="{{$parties->name}}">{{$parties->name}}</option>
            @endforeach
            <option value="PPP">PPP</option>
         </select>
    </div>
    <input type="submit" name="" id="" value="submit">


    </form>

</body>
</html>

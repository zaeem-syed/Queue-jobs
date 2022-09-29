<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>

<table>
    <tr>
        <td>Create Post</td>
    </tr>
    <tbody>
        <tr><td>


            <form action="">
            <select name="channel" id="">
                @foreach($channel as $channels)
                <option value="{{$channels->id}}">{{$channels->name}}</option>
                @endforeach
            </select>
            <input type="text" name="name" id="">
            <input type="submit" name="submit" id="" value="submit">
        </form>
        </tr>
    </td>
    </tbody>
</table>


</body>
</html>

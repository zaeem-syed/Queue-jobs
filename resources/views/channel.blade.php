<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is Channel Page </title>
</head>
<body>


    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
        </tr>
        <tbody>
            @foreach($channel as $channels)

            <tr>
                <td>{{$channels->id}}</td>
                <td>{{$channels->name}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>




</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List of post that are unread today</h1>
@foreach ($not_read_arr as $id)
    <a href="{{route('post.view', ['id' => $id])}}"><h3>{{getTitle($id)}}</h3></a><br/>
@endforeach
</body>
</html>

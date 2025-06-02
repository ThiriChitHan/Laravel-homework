<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Article Edit</h1>
    <form action="{{route('articles.update',$articles->id)}}" method="POST">
        @csrf
        <input type="text" name="name"  value="{{$articles->name}}" />
        <input type="text" name="email"  value="{{$articles->email}}" />
        <button type="submit">
            Update
        </button>
    </form>
</body>
</html>
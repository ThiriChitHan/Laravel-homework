<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h3>Articledata</h3>
          <a href="{{route('articles.create')}}">+Create</a>
    @foreach ($articledata as $data )
         <p>{{ $data['id']}} : {{ $data['name']}}: {{ $data['email']}}</p>
          <a href="{{route('articles.show', ['id' => $data->id])}}">Show</a> 
          <a href="{{route('articles.edit',['id' => $data->id])}}">Edit</a>
          <form action="{{ route('articles.delete', $data->id) }}" method="POST">
                @csrf
                <button>Delete</button>
            </form>
    @endforeach
</body>
</html>
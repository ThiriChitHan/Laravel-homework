<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h3>Articledata</h3>
    @foreach ($articledata as $data )
         <p>{{ $data['id']}} : {{ $data['name']}}: {{ $data['email']}}</p>
          <a href="{{route('articles.show', ['id' => $data->id])}}">Show</a> 
    @endforeach
</body>
</html>
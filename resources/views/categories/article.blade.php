<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <h3>Userdata</h3>
    @foreach ($userdata as $data )
         <p>{{ $data['id']}} {{ $data['name']}} {{ $data['email']}}</p> 
    @endforeach
</body>
</html>
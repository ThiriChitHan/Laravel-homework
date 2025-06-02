<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3 class="mt-4">Articledata</h3>
        <a href="{{route('articles.create')}}" class="btn btn-outline-success mb-4">+Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">EMAIL</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articledata as $data )
                <tr>
                    <td>{{ $data['id']}}</td>
                    <td>{{ $data['name']}}</td>
                    <td>{{ $data['email']}}</td>
                    <td class="d-flex">
                        <a href="{{route('articles.show', ['id' => $data->id])}}" class="btn btn-outline-primary me-2" >Show</a>
                        <a href="{{route('articles.edit',['id' => $data->id])}}" class="btn btn-outline-warning me-2">Edit</a>
                        <form action="{{ route('articles.delete', $data->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger ">Delete</button>
                        </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
    <!-- @foreach ($articledata as $data )
         <p>{{ $data['id']}} : {{ $data['name']}}: {{ $data['email']}}</p>
          <a href="{{route('articles.show', ['id' => $data->id])}}">Show</a> 
          <a href="{{route('articles.edit',['id' => $data->id])}}">Edit</a>
          <form action="{{ route('articles.delete', $data->id) }}" method="POST">
                @csrf
                <button>Delete</button>
            </form>
    @endforeach -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
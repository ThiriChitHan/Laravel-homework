<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- <h1>Article Edit</h1>
    <form action="{{route('articles.update',$articles->id)}}" method="POST">
        @csrf
        <input type="text" name="name"  value="{{$articles->name}}" />
        <input type="text" name="email"  value="{{$articles->email}}" />
        <button type="submit">
            Update
        </button>
    </form> -->
    <!-- <ul class="list-group">
        <form action="{{route('articles.update',$articles->id)}}" method="POST">
            @csrf
            <li class="list-group-item active" aria-current="true">Article Edit</li>
            <li class="list-group-item">
                <input type="text" name="name" value="{{$articles->name}}" />
            </li>
            <li class="list-group-item">
                <input type="text" name="email" value="{{$articles->email}}" />
            </li>
            <li class="list-group-item"> <button type="submit">
                    Update
                </button>
            </li>
        </form>
    </ul> -->
    <div class="container">
       
        <div class="card">
            <div class="card-header">
                Article Edit
            </div>
            <form action="{{route('articles.update',$articles->id)}}" method="POST">
        @csrf
            <div class="card-body">
                <input type="text" name="name" value="{{$articles->name}}" />
                <input type="text" name="email" value="{{$articles->email}}" />
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">
                    Update
                </button>
                <a href="{{route('articles.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
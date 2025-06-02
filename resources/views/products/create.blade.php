<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <h1>+Careate</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter the Prodcut Name">
        <input type="text" name="description"   placeholder="Enter the description">
        <input type="text" name="price"   placeholder="Enter the price">
        <button type="submit">+Create</button>
    </form> -->

     <div class="container">
        <div class="mt-4 text-danger">
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="card mt-4">
            <div class="card-header">
                + Create
            </div>
            <form action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="text" class="form-control mb-2" placeholder="Enter Your Product Name" name="name">
                    <input type="text" class="form-control" placeholder="Enter Your Description" name="email">
                    <input type="text" class="form-control" placeholder="Enter Your Price" name="email">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary me-2" type="submit">
                        Create
                    </button>
                    <a href="{{route('articles.index')}}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
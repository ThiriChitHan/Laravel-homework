<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <!-- <h1>Product Edit</h1>
    <form action="{{route('products.update',$products->id)}}" method="POST">
        @csrf
        <input type="text" name="name"  value="{{$products->name}}" />
        <input type="text" name="description"  value="{{$products->description}}" />
        <input type="text" name="price"  value="{{$products->price}}" />
        <button type="submit">
            Update
        </button> 
    </form> -->

        <div class="container">
       
        <div class="card">
            <div class="card-header">
                Product Edit
            </div>
            <form action="{{route('products.update',$products->id)}}" method="POST">
        @csrf
            <div class="card-body">
                <input type="text" name="name" value="{{$products->name}}" />
                <input type="text" name="email" value="{{$products->description}}" />
                <input type="text" name="email" value="{{$products->price}}" />
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">
                    Update
                </button>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
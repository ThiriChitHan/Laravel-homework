<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <h1>Product Edit</h1>
    <form action="{{route('products.update', $product->id)}}" method="POST">

    @csrf

    <input type="text" name="name" value="{{$product->name}}">

    <button type="submit">
        Update
    </button>
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
                Product Edit
            </div>
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="card-body">
                    <input type="text" class="form-control mb-2" name="name" value="{{ $product->name }}"/>
                    <input type="text" class="form-control mb-2" name="description" value="{{ $product->description }}"/>
                    <input type="text" class="form-control mb-2" name="price" value="{{ $product->price }}"/>

                    <select name="category_id" id="">
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}" @if ($category->id === $product->category_id)
                                selected
                            @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" id="status" name="status" value="1">
                        <label class="form-check-label" for="status">Active</label>
                    </div>

                </div>





                <div class="card-footer">
                    <button class="btn btn-primary me-2" type="submit">
                        Update
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

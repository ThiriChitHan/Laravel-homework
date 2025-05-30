<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product Edit</h1>
    <form action="{{route('products.update',$products->id)}}" method="POST">
        @csrf
        <input type="text" name="name"  value="{{$products->name}}" />
        <input type="text" name="description"  value="{{$products->description}}" />
        <input type="text" name="price"  value="{{$products->price}}" />
        <button type="submit">
            Update
        </button> 
    </form>
</body>
</html>
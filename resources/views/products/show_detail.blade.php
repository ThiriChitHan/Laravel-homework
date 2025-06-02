<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        <!-- <h1>Show Products</h1>
        <p>{{$products->id}} : {{$products->name}} : {{$products->description}} : {{$products->price}}</p> -->

          <div class="card m-4" style="width: 18rem; ">
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-primary">Products Show-detail</li>
    <li class="list-group-item">{{$products->id}} . {{$products->name}}</li>
    <li class="list-group-item">{{$products->description}}</li>
    <li class="list-group-item">{{$products->price}}</li>
    <li class="list-group-item "> <a href="{{route('products.index')}}" class="btn">Back</a></li>
    
     
  </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>


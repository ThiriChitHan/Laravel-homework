<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- <div  class="">
        <h3 class="text-primary text-center p-2">Article Show</h3>
        <p>{{$articledata->id}} : {{$articledata->name}} : {{$articledata->email}}</p>
    </div> -->

    <div class="card m-4" style="width: 18rem; ">
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-primary">Article Show</li>
    <!-- <li class="list-group-item">{{$articledata->id}}</li> -->
    <li class="list-group-item">{{$articledata->id}} . {{$articledata->name}}</li>
    <li class="list-group-item">{{$articledata->email}}</li>
    <li class="list-group-item "> <a href="{{route('articles.index')}}" class="btn">Back</a></li>
    
     
  </ul>
</div>
</body>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>

<!-- {{-- {{dd($category)}} --}} 
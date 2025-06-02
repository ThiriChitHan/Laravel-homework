<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
        <h3 class="mt-4">Products List</h3>
        <a href="{{route('products.create')}}" class="btn btn-outline-success mb-4">+Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">DESCRIPTION</th>
                    <th class="bg-secondary text-white">PRICE</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr>
                    <td>{{ $product['id']}}</td>
                    <td>{{ $product['name']}}</td>
                    <td>{{ $product['description']}}</td>
                    <td>{{ $product['price']}}</td>
                    <td class="d-flex">
                        <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-outline-primary me-2" >Show detail</a>
                        <a href="{{route('products.edit',['id' => $product->id])}}" class="btn btn-outline-warning me-2">Edit</a>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger ">Delete</button>
                        </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>







     <!-- <div>
        <h1>Products List</h1>
         <a href="{{route('products.create')}}">+Create</a>
        @foreach ($products as $product )
        <p>{{ $product['id']}} : {{ $product['name']}} : {{$product['description']}} : {{$product['price']}}</p>
          <a href="{{route('products.show', ['id' => $product->id])}}">Show detail</a> 
          <a href="{{route('products.edit', ['id' => $product->id])}}">edit</a>
          
           <form action="{{ route('products.delete', $product->id) }}" method="POST">
                @csrf
                <button>Delete</button>
            </form>
        @endforeach
    </div> -->
</body>
</html>
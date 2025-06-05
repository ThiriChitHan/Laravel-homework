    @extends('layouts.master')
    @section('content')
        
    <div class="container">
        <h1 class="mt-4">Product List</h1>

        <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4">Create</a>
        <a href="{{route('categories.index')}}" class="btn btn-outline-warning mb-4">Category List</a>

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">Description</th>
                    <th class="bg-secondary text-white">Image</th>
                    <th class="bg-secondary text-white">Price</th>
                    <th class="bg-secondary text-white">CATEGORY</th>
                    <th class="bg-secondary text-white">Status</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="text-center">
                    <td>{{$product['id']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['description']}}</td>
                    <td><img src="{{asset('productImages/'.$product['image'])}}" alt="{{$product->image}}" style="width: 50px; height: 50px;  "></td>

                    <td>{{$product['price']}}</td>
                    <td>{{ $product['category']['name'] }}</td>

                    @if ($product->status == 1)
                    <td class="text-success">Active</td>
                    @else
                    <td class="text-danger">Suspend</td>
                    @endif

                    <td class="d-flex">
                        <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-outline-primary me-2">Show</a>
                        <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-outline-warning me-2">Edit</a>

                        <form action="{{ route('products.delete', $product->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @endsection

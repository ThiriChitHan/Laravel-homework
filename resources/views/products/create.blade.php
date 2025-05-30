<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>+Careate</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter the Prodcut Name">
        <input type="text" name="description"   placeholder="Enter the description">
        <input type="text" name="price"   placeholder="Enter the price">
        <button type="submit">+Create</button>
    </form>
</body>
</html>
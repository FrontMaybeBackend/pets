<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<a href="{{route('pets.index')}}">
    <button type="submit" class="btn btn-primary">Back</button>
</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Tag</th>
        <th scope="col">Photo</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $pet->id }}</th>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->status }}</td>
            <td>{{ $pet->tag }}</td>
            <td>{{ $pet->category->name }}</td>
            <td><img src="{{asset('storage/' . $pet->photoUrls)}}"></td>
        </tr>
    </tbody>
</table>

</body>
</html>

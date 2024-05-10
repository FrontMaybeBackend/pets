<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<a href="{{ route ('pets.create') }}">
    <button type="button" class="btn btn-primary">Add new pet</button>
</a>

<table class="table w-50">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Tag</th>
        <th scope="col">Category</th>
        <th scope="col">Photo</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($pets as $pet)
        <tr>
            <th scope="row">{{ $pet->id }}</th>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->status }}</td>
            <td>{{ $pet->tag }}</td>
            <td>{{ $pet->category->name }}</td>
            <td><img src="{{asset('storage/' . $pet->photoUrls)}}"></td>
            <td>
             <form action="{{ route('pets.delete', $pet) }}" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-info">Delete</button>
             </form>
            </td>
            <td>
                <a href="{{ route('pets.edit',$pet) }}">
                    <button type="button" class="btn btn-danger"> Edit</button>
                </a>
                <a href="{{ route ('pets.show', $pet) }}">
                    <button type="button" class="btn btn-info">Info</button>
                </a>
            </td>
            <td>

            <td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

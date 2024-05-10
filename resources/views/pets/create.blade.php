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
<form method="post" action="{{route('pets.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Pet name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
               aria-describedby="name" required maxlength="20">
        <div id="emailHelp" class="form-text">Name of pet</div>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <select name="category_id" id="category_id" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div id="emailHelp" class="form-text">Category pet</div>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
        @error('photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tag" class="form-label">Tags</label>
        <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" required
               maxlength="20">
        @error('tag')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="status" class="form-label"> Status
            <select name="status" class="form-select @error ('status') is-invalid @enderror">
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{route('pets.index')}}">
    <button type="submit" class="btn btn-primary">Back</button>
</a>

</body>
</html>


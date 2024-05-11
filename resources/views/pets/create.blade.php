@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('pets.store', 'id')}}" enctype="multipart/form-data">
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
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category">
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
        <input type="text" class="form-control" id="tag" name="tag">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label"> Status
            <select name="status" class="form-select">
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{route('pets.index')}}">
    <button type="submit" class="btn btn-primary">Back</button>
</a>
@endsection

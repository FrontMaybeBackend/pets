@extends('layouts.app')

@section('content')
    @if(isset($pet['id']))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Photo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $pet['id'] }}</th>
                <td>{{ $pet['name'] }}</td>
                <td>{{ $pet['status'] }}</td>
                @if(isset($pet['category']['name']))
                    <td>{{ $pet['category']['name'] }}</td>
                @endif
                @if(isset($pet['tags']))
                    @foreach($pet['tags'] as $tag)
                        <td>{{ $tag['name'] }}</td>
                    @endforeach
                @endif
            </tr>
            <tr>
                <h2>Upload image</h2>
                <form method="POST" action="{{ route('pets.storeImage', $pet['id']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="petId" class="form-label">PetId</label>
                        <input type="text" class="form-control" required
                               id="petId" name="petId" readonly
                               value="{{ $pet['id'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="metadata" class="form-label">MetaData</label>
                        <input type="text" class="form-control"
                               id="metaData" name="metaData">
                    </div>
                    <div class="mb-3">
                        <label for="photoUrls" class="form-label">Photo</label>
                        <input type="file" class="form-control"
                               id="photoUrls" name="photoUrls">
                    </div>
                    <button type="submit" class="btn btn-primary" >Upload</button>
                </form>
                @endif
                <a href="{{ route('pets.index') }}">
                    <button type="button" class="btn btn-primary">Back</button>
                </a>
        @endsection

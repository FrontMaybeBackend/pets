@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Pet</h1>
        <form action="{{ route('pets.update', $pet['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Pet name</label>
                <input type="text" class="form-control" required maxlength="20"
                       id="name" name="name"
                       value="{{ $pet['name'] }}">
                <div id="emailHelp" class="form-text">Name of pet</div>
            </div>
            <div class="mb-3">
                <label for="tag" class="form-label">Tags</label>
                @if(isset($pet['tags']))
                    @foreach($pet['tags'] as $tag)
                        <input type="text" class="form-control" id="tag" name="tag_name" required
                               value="{{ $tag['name'] }}">
                    @endforeach
                @else
                    <input type="text" class="form-control" id="tag" name="tag_name" required>
                @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category_name"
                       value="{{ isset($pet['category']['name']) ? $pet['category']['name'] : '' }}">
                <div id="emailHelp" class="form-text">Category pet</div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status">
                    <option value="available" {{ $pet['status'] == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="pending" {{ $pet['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="sold" {{ $pet['status'] == 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('pets.index') }}">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
@endsection

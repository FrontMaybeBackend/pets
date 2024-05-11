@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Pet</h1>
        @if(isset($pet['id']))
            <form  action="{{ route('pets.update', $pet['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Pet name</label>
                    <input type="text" class="form-control" required maxlength="20"
                           id="name" name="name"
                           value="{{ $pet['name'] }}">

                    <div id="emailHelp" class="form-text">Name of pet</div>
                </div>
                @if(isset($pet['tag']))
                    <div class="mb-3">
                        <label for="tag" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tag" name="tag" required
                               maxlength="20"
                               value="{{ $pet['tag'] }}">
                        @else
                            <label for="tag" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tag" name="tag" required
                                   maxlength="20"
                            >
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" @if (isset($pet['category']['name'])) value="{{$pet['category']['name']}} @endif">
                        <div id="emailHelp" class="form-text">Category pet</div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" id="status">
                            <option value="available">Available</option>
                            <option value="pending">Pending</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
            </form>
        <a href="{{route('pets.index')}}">
            <button type="submit" class="btn btn-primary">Back</button>
        </a>
@endsection

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
        @if(isset($pet['tag']))
            <td> {{$pet['tag']}}</td>
        @endif
    </tr>
    <form action="{{ route('pets.delete', $pet['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-info">Delete</button>
    </form>
    </tbody>
</table>
    @endif
<a href="{{ route ('pets.index') }}">
    <button type="button" class="btn btn-primary">Back</button>
</a>

@endsection

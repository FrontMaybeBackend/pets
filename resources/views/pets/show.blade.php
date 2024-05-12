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
                    @foreach ($pet['tags'] as $tag)
                       <td> {{ $tag['name'] ?? 'brak tagu' }}</td>
                    @endforeach
                @endif
                <td>
                    @if(isset($pet['photoUrls'][0]))
                        <img src="{{ $pet['photoUrls'][0] }}" alt="Pet Photo" style="max-width: 200px; max-height: 200px;">
                    @else
                        brak zdjęcia
                    @endif
                </td>
            </tr>
            <tr>
                @endif
                <a href="{{ route('pets.index') }}">
                    <button type="button" class="btn btn-primary">Back</button>
                </a>
        @endsection

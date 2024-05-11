@extends('layouts.app')

@section('content')

    <a href="{{ route ('pets.create') }}">
        <button type="button" class="btn btn-primary">Add new pet</button>
    </a>

    <form action="{{ route('pets.status','status') }}" method="GET">
        <p>Find pet by status</p>
        <div class="mb-3">
            <label for="status" class="form-label"> Status
                <select name="status" class="form-select">
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="sold">Sold</option>
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($status))
        <table class="table w-75">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Category</th>
                <th scope="col">Tag</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($status as $pet)
                <tr>
                    <th scope="row">{{ $pet['id'] }}</th>
                    <td>{{ $pet['name'] }}</td>
                    <td>{{ $pet['status'] }}</td>
                    @if(isset($pet['category']['name']))
                        <td>{{ $pet['category']['name'] }}</td>
                    @else
                        <td>Brak kategorii</td>
                    @endif

                    <td>
                        @if(isset($pet['tags']))
                            @foreach ($pet['tags'] as $tag)
                                {{$tag['name']}}
                            @endforeach
                        @else
                            brak tagu
                        @endif
                    </td>

                    <td>
                        @if(isset($pet['photoUrls']['photoUrl']))
                            {{$pet['photoUrls']['photoUrl']}}
                        @else
                            brak zdjęcia
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('pets.delete', $pet['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info">Delete</button>
                        </form>
                    </td>

                    <td>
                        <a href="{{ route ('pets.edit', $pet['id']) }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Nie znaleziono</p>
    @endif


@endsection

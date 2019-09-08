@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Resolver</th>
                    <th scope="col">Status</th>
                    <th scope="col">Size</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created</th>
                    <th scope="col">Closed</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response['data'] as $row)
                    <tr>
                        <td>{{ $row['id'] }}</td>
                        <td>
                            <a href="{{ $row['first_image'] }}" target="_blank">
                                <img src="{{ $row['first_image'] }}" alt="" style="max-width: 70px;">
                            </a>
                        </td>
                        <td>{{ $row['author'] }}</td>
                        <td>{{ $row['resolver'] }}</td>
                        <td>{{ $row['status'] }}</td>
                        <td>{{ $row['size'] }}</td>
                        <td>{{ $row['type'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($row['date_created'])->toDateTimeString() }}</td>
                        <td>{{ $row['date_closed'] ? \Carbon\Carbon::parse($row['date_closed'])->toDateTimeString() : '' }}</td>
                        <td>
                            <a href="{{ route('editObject', ['id' => $row['id']]) }}">Edit</a>
                            <a href="{{ route('deleteObject', ['id' => $row['id']]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

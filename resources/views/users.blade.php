@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Api key</th>
                    <th scope="col">Email</th>
                    <th scope="col">Points</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response['data'] as $row)
                    <tr>
                        <td>{{ $row['id'] }}</td>
                        <td>{{ $row['role'] }}</td>
                        <td>{{ $row['status'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['api_key'] }}</td>
                        <td>{{ $row['email'] }}</td>
                        <td>{{ $row['points'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($row['date_created'])->toDateTimeString() }}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

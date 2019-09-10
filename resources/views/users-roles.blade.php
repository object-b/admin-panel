@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Ref (Unique id)</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response['data'] as $row)
                    <tr>
                        <td>{{ $row['id'] }}</td>
                        <td>{{ $row['ref'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>
                            <a href="{{ route('editUserRole', ['id' => $row['id']]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

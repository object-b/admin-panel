@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach ($response['cols'] as $column)
                                    <th scope="col">{{ $column }}</th>
                                @endforeach

                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response['rows'] as $rows)
                                <tr>
                                    @foreach ($rows as $row)
                                        <td>{{ $row }}</td>
                                    @endforeach

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
        </div>
    </div>
</div>
@endsection

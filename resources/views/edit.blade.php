@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('updateObject', ['id' => $id]) }}" method="POST">
            @csrf
            @foreach ($response['data'] as $column => $row)
                <div class="form-group">
                    <label for="{{ $column }}">{{ $column }}</label>
                    <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" value="{{ $row }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
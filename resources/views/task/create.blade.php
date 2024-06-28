@extends('layouts.app')
@include('common.errors')
@section('content')
    <div>
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection


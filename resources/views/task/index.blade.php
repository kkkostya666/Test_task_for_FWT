@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавить задачу') }}</div>
                    <div class="card-body">
                        @foreach($tasks as $task)
                            <div><a href="{{ route('task.show', $task->id) }}"> {{$task->id}}.{{ $task->name}}</div>
                        @endforeach
                            <a href="{{route('tasks.create')}}" class="btn btn-success mb-3">Добавить задачу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

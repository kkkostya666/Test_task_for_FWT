@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Удалить задачу') }}</div>
                    <div class="card-body">
                        <div>{{$task->name}}
                            <div>
                                <form action="{{route('task.delete', $task->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-success">Delete</button>
                                </form>
                                <div>
                                    <a href="{{route('tasks.index')}}">Back</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

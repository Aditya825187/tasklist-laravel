@extends('layouts.app')
@section('title',$task->title)


@section('content')

<p>{{$task->description}}</p>


@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>
<div>
    <p>Task is {{$task->completed ? 'completed' : 'Active'}}</p>
</div>
<div>
    <a href="{{route('tasks.edit',['task'=>$task->id])}}">Edit</a>
</div>
<div>
    <form action="{{route('tasks.toggle-complete',['task'=>$task])}}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit">Mark as {{$task->completed ? 'Active' : 'completed'}}</button>

    </form>
</div>
<div>
    <form action="{{route('tasks.delete',['task'=>$task])}}" method="POST" >
        @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
    </form>
</div>
@endsection

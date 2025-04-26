@extends('layouts.master')

@section('heading')
    <p class="flex gap-1 items-center">
        <img src="{{ asset('/images/icons8-task-30.png') }}" class="size-6" alt="task"/>
        <span>{{ $task->title }}</span>
    </p>
@endsection

@section('content')
    <div class="mb-4">
        <a href="/tasks" class="underline text-blue-500">Back to the list</a>
    </div>

    <div @class(["flex items-center justify-between gap-2 border-l-4 mb-4 py-1 px-2",
                     "bg-yellow-300/60 border-yellow-500" => !$task->completed,
                     "bg-green-300/60 border-green-500" => $task->completed])>
        <div>
            @if($task->completed)
                <p class="flex gap-1 items-center text-green-800">
                    <img src="{{ asset('/images/icons8-checkmark-24.png') }}" class="size-5" alt="checkmark"/>
                    <span>Task Completed</span>
                </p>
            @else
                <p class="text-amber-800">
                    Task Not Completed Yet
                </p>
            @endif
        </div>

        <button form="form-toggle-complete" class="cursor-pointer text-sm text-slate-600 font-semibold hover:underline">
            Mark as {{ $task->completed ? 'Not Completed': 'Completed' }}
        </button>
    </div>

    <p class="mb-4">{{ $task->description }}</p>

    <p class="mb-4">{{ $task->planing }}</p>

    <ul class="list-disc list-inside mb-4 text-xs text-slate-500/70 font-semibold">
        <li>created {{ $task->created_at->diffForHumans() }}</li>
        <li>updated {{ $task->updated_at->diffForHumans() }}</li>
    </ul>

    <div class="flex items-center gap-2 mt-10">
        <form id="form-toggle-complete" method="post" action="">
            @csrf
            @method('PATCH')
        </form>

        <a href="/tasks/{{ $task->id }}/edit" class="btn-simple">Edit</a>

        <form method="post">
            @csrf
            @method('DELETE')

            <button class="btn-delete">Delete</button>
        </form>
    </div>

@endsection

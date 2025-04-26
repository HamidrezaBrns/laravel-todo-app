@extends('layouts.master')

@section('heading', 'List of Tasks')

@section('content')
    <div>
        @foreach($tasks as $task)
            <div class="flex justify-between items-center py-3 border-b border-gray-300">
                <a href="{{ route('tasks.show', $task) }}"
                    @class(['hover:underline', 'text-slate-500/70 line-through' => $task->completed])>
                    {{ $task->title }}
                </a>

                <div class="space-x-1">
                    @forelse($task->categories as $category)
                        <a href="" class="px-2 py-1 bg-slate-300 hover:bg-slate-200 rounded-xl text-slate-800 transition-colors duration-300">
                            {{ $category->name }}
                        </a>
                    @empty

                    @endforelse
                </div>

            </div>
        @endforeach

        <div class="flex justify-center py-3 text-slate-500">
            <a href="{{ route('tasks.create') }}" class="flex items-center gap-1">
                <img src="{{ asset('/images/icons8-plus-24.png') }}" alt="add-task" class="size-4">
                <span>Add Task</span>
            </a>
        </div>
    </div>

    <div class="mt-10">
        {{ $tasks->links() }}
    </div>
@endsection

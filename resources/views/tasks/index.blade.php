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

                <div class="flex items-center gap-1">
                    @foreach($task->categories as $category)
                        <x-category-tag href="{{ route('categories.show', $category) }}">
                            {{ $category->name }}
                        </x-category-tag>
                    @endforeach
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

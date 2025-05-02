@extends('layouts.master')

@section('heading', 'List of Tasks')

@section('content')
    <form class="flex items-center gap-2 mb-4">
        <input type="text"
               name="q"
               class="shadow-sm border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded border-slate-300 h-10"
               value="{{ request('q') }}"
               placeholder="Search by title..."
        />

        <button
            class="cursor-pointer bg-white rounded px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 h-10">
            Search
        </button>
        <a href="/" class="btn-simple h-10">
            Clear
        </a>
    </form>

    <div>
        @foreach($tasks as $task)
            <x-task-card :$task/>
        @endforeach

        <div class="flex justify-center py-3">
            <x-add-link href="{{ route('tasks.create') }}">Add Task</x-add-link>
        </div>
    </div>
@endsection

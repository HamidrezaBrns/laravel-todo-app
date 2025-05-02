@props(['task'])

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

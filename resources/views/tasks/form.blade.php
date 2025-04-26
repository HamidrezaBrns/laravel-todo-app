@section('heading', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="post" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">Title</label>
            <input
                @class(['task-input', 'outline-red-500' => $errors->has('title')])
                type="text"
                id="title"
                name="title"
                value="{{ $task->title ?? old('title') }}"
                placeholder="Work..."
            />

            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea
                @class(['task-input', 'outline-red-500' => $errors->has('description')])
                id="description"
                name="description"
                rows="5"
                placeholder="I'm going to do..."
            >{{ $task->description ?? old('description') }}</textarea>

            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button class="btn-submit">
                {{ isset($task) ? 'Update' : 'Store' }}
            </button>
            <a href="{{ isset($task) ? route('tasks.show', $task) : route('tasks.index') }}" class="btn-simple">
                Cancel
            </a>
        </div>
    </form>

@endsection

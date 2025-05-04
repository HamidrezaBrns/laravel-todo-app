<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        Gate::authorize('view-any', Task::class);

        $tasks = Auth::user()
            ->tasks()
            ->with('categories')
            ->when($request->q, fn(Builder $query) => $query->where('title', 'LIKE', "%$request->q%"))
            ->latest()
            ->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        Gate::authorize('create', Task::class);

        $categories = Auth::user()->categories;

        return view('tasks.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('create', Task::class);

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'categories' => ['sometimes', 'array'],
            'categories.*' => ['exists:categories,id,user_id,' . auth()->id()]
        ]);

        $task = Auth::user()->tasks()->create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->has('categories')) {
            $task->categories()->sync($request->categories);
        } else {
            $task->categories()->detach();
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        Gate::authorize('view', $task);

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        Gate::authorize('update', $task);

        $categories = Auth::user()->categories;

        return view('tasks.edit', [
            'task' => $task,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        Gate::authorize('update', $task);

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'categories' => ['sometimes', 'array'],
            'categories.*' => ['exists:categories,id,user_id,' . auth()->id()]
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->has('categories')) {
            $task->categories()->sync($request->categories);
        } else {
            $task->categories()->detach();
        }

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }

    public function toggleComplete(Task $task): RedirectResponse
    {
        Gate::authorize('update', $task);

        $task->toggleComplete();

        return redirect()->back();
    }
}

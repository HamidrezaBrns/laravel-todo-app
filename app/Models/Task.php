<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected $guarded = [];

    public function toggleComplete(): void
    {
        $this->completed = !$this->completed;
        $this->save();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'task_category');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

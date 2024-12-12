<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'project_id', 'status_id'];

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'tags_tasks', 'task_id', 'tag_id');
    }

    public function status(): BelongsTo{
        return $this->belongsTo(Status::class);
    }
}

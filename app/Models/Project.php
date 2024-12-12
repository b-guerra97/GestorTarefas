<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description','due_date', 'status_id','user_id'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks(): HasMany{
        return $this->hasMany(Task::class, 'project_id');
    }

    public function status(): BelongsTo
    {
         return $this->belongsTo(Status::class);
    }

}

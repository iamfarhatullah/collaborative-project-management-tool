<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'project_id', 'start_date', 'end_date', 'status', 'description'];

    // Belongs to a project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // Many-to-many relationship with Users
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_details', 'task_id', 'user_id');
    }
}

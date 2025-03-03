<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'status', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_details');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }
}

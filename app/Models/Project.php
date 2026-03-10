<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'start_date',
        'deadline',
        'members',
        'is_completed'
    ];

    public function members(){
        // return $this->belongsToMany(User::class, 'project_user', 'project_id', 'member_id');
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }
}

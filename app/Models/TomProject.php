<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomProject extends Model
{
    protected $table = 'tom_projects';

    // Define a one-to-many relationship with TomTask
    public function tasks()
    {
        return $this->hasMany(TomTask::class, 'project_id', 'id');
    }
}

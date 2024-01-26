<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomTask extends Model
{
    protected $table = 'tom_tasks';

    // Define a many-to-one (inverse of one-to-many) relationship with TomProject
    public function project()
    {
        return $this->belongsTo(TomProject::class, 'project_id', 'id');
    }

    // Define a one-to-many relationship with TomReport
    public function reports()
    {
        return $this->hasMany(TomReport::class, 'task_id', 'id');
    }
}

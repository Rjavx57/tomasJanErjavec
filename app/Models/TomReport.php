<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomReport extends Model
{
    protected $table = 'tom_reports';

    // Define a many-to-one (inverse of one-to-many) relationship with TomTask
    public function task()
    {
        return $this->belongsTo(TomTask::class, 'task_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'path',
        'sort_order',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

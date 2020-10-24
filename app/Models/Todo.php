<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'description', 'complete', 'project_id'
    ];


    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }    
}

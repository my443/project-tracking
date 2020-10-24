<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projectname', 'projectdesc', 'addeddate', 
        'startdate', 'duedate', 'actualcompletiondate', 
        'active' 
    ];
    
    public function todos()
    {
        return $this->hasMany('App\Models\Todo');
    }        
}

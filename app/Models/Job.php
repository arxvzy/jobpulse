<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'job_type',
        'status',  
        'employer_id',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

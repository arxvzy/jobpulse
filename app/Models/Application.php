<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'application_status',
        'application_date'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
    'application_date' => 'datetime',
];
}

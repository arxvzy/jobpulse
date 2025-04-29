<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'id_job',
        'id_user',
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
}

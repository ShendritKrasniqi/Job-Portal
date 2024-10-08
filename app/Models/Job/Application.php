<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;


    protected $table = 'applications';

    protected $fillable = [

    'id',
    'cv', 
    'job_id',
    'email',
    'user_id',
    'job_image',
    'job_title',
    'job_region',
    'job_type',
    'company',

    ];

    public $timestamps = true;
}




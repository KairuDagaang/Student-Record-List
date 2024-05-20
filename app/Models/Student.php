<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Subject;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'name',
        'course',
        'year',
        'subject'
    ];
}

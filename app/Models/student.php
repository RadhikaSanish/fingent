<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory, SoftDeletes;

    
    /**
     * Get the teacher associated with the student.
     */
    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'reporting_teacher_id', 'id');
    }
}

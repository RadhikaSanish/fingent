<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class studentmark extends Model
{
    use HasFactory, SoftDeletes;


     /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'student_marks';


     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];



    /**
     * Change the date format.
     *
     * @param  string  $value
     * @return date
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y H:i: a');
    }

    /**
     * Get the student associated with the marks.
     */
    public function student()
    {
        return $this->hasOne(student::class, 'id', 'student_id');
    }
    
    /**
     * Get the term associated with the marks.
     */
    public function student_term()
    {
        return $this->belongsTo(Term::class, 'term', 'id');
    }
}

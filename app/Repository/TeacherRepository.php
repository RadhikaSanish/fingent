<?php
namespace App\Repository;

use App\Models\student;
use App\Models\teacher;

class TeacherRepository {

     /**
     * Get all teachers.
     * 
     * @return Object $teachers
     */
    public function getAll(){
        return teacher::all();
    }
}
?>
<?php
namespace App\Repository;

use App\Models\student;
use App\Models\Term;

class StudentRepository {

     /**
     * Get all students.
     * 
     * @return Object $student
     */
    public function getAll(){
        return student::with(array('teacher' => function($query) {

        }))->paginate(10);
    }

     /**
     * Get all students.
     * 
     * @return Object $student
     */
    public function getAllStudents(){
        return student::get();
    }

    
    /**
     * Get all terms.
     * 
     * @return Object $term
     */
    public function getAllterms(){
        return Term::get();
    }

     /**
     * Save student data
     * 
     * @param Object $request
     * @return Object $student
     */
    public function store($request){
        $student = new student();
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->gender = $request->input('gender');
        $student->reporting_teacher_id = $request->input('reporting_teacher_id');
        $student->save();
    }

    /**
     * Get Student data by id
     * 
     * @param Integer $id
     * @return Object $student
     */

    public function find($id) {
        return Student::where('id', $id)->first();
    }


     /**
     * Update student data
     * 
     * @param Object $request
     * @return Object $student
     */
    public function update($request){
        return student::where('id', $request->id)->update([
            'name' => $request['name'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'reporting_teacher_id' => $request['reporting_teacher_id']
        ]);
    }


     /**
     * Delete student data
     * 
     * @param Integer $id
     * @return Void
     */
    public function delete($id)  {
        $student = student::findOrFail($id);
        $student->delete();
    }

}
?>
<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Repository\TeacherRepository;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    
    /**
     * List all students
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
        $students = (new StudentRepository())->getAll();
        return view('student.index', compact('students'));
     }

     /**
     * Show student create form
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $teachers = (new TeacherRepository())->getAll();
        return view('student.create', compact('teachers'));
    }


     /**
     * Create student
     * 
     * @param App\Http\Requests\StudentCreateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function store(StudentCreateRequest $request)
    {
        try {
            DB::beginTransaction();
                (new StudentRepository())->store($request);
            DB::commit();
            return redirect('student')->with('success', 'Student has been saved!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('student')->with('success', 'Student Created Failed!');
        }
    }


     /**
     * Show student edit form
     * 
     * @param Illuminate\Http\Request $id
     * 
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $student = (new StudentRepository())->find($id);
        $teachers = (new TeacherRepository())->getAll();
        return view('student.edit', compact('student', 'teachers'));
    }


    /**
     * Update student data
     * 
     * @param App\Http\Requests\StudentUpdateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function update(StudentUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
                (new StudentRepository())->update($request);
            DB::commit();
            return redirect('student')->with('success', 'Student has been updated!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('student')->with('success', 'Student Updated Failed!');
        }
    }


    /**
     * Remove the specified resource from table student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new StudentRepository())->delete($id);       
        return redirect('student')->with('success', 'Student has been deleted');
    }

}

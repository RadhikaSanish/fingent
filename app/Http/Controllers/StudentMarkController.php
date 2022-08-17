<?php

namespace App\Http\Controllers;

use App\Repository\StudentMarkRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StudentMarkCreateRequest;
use App\Http\Requests\StudentMarkUpdateRequest;
use App\Repository\StudentRepository;
use Illuminate\Support\Facades\DB;

class StudentMarkController extends Controller
{
    
    /**
     * List all StudentMarks
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
        $studentMarks = (new StudentMarkRepository())->getAll();
        return view('studentmark.index', compact('studentMarks'));
     }

     /**
     * Show StudentMark create form
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $students = (new StudentRepository())->getAllStudents();
        $terms = (new StudentRepository())->getAllterms();
        return view('studentmark.create', compact('students','terms'));
    }


     /**
     * Create studentMark
     * 
     * @param App\Http\Requests\StudentMarkCreateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function store(StudentMarkCreateRequest $request)
    {

        try {
            DB::beginTransaction();
                (new StudentMarkRepository())->store($request);
            DB::commit();
            return redirect('student/mark')->with('success', 'Student Mark has been saved!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('student/mark')->with('success', 'Student Created Failed!');
        }
    }


     /**
     * Show studentMark edit form
     * 
     * @param Illuminate\Http\Request $id
     * 
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $studentMark = (new StudentMarkRepository())->find($id);
        $students = (new StudentRepository())->getAllStudents();
        $terms = (new StudentRepository())->getAllterms();
        return view('studentmark.edit', compact('studentMark', 'students', 'terms'));
    }


    /**
     * Update studentMark data
     * 
     * @param App\Http\Requests\StudentMarkUpdateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */

    public function update(StudentMarkUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
                (new StudentMarkRepository())->update($request);
            DB::commit();
            return redirect('student/mark')->with('success', 'Student Mark has been updated!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('student/mark')->with('success', 'Student Updated Failed!');
        }
    }


    /**
     * Remove the specified resource from table studentMark.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new StudentMarkRepository())->delete($id);       
        return redirect('studentMark')->with('success', 'StudentMark has been deleted');
    }

}

<?php
namespace App\Repository;

use App\Models\studentmark;

class StudentMarkRepository {

     /**
     * Get all studentMarks.
     * 
     * @return Object $studentMark
     */
    public function getAll(){
        return studentmark::with('student_term')->with(array('student' => function($query) {

        }))->whereHas('student', function($q) {})->paginate(10);
    }

     /**
     * Save studentMark data
     * 
     * @param Object $request
     * @return Object $studentMark
     */
    public function store($request){
        $studentMark = new studentmark();
        $studentMark->student_id = $request->input('student_id');
        $studentMark->maths = $request->input('maths');
        $studentMark->science = $request->input('science');
        $studentMark->history = $request->input('history');
        $studentMark->term = $request->input('term');;
        $studentMark->total_mark = $this->calculateTotalMarks([$request->input('maths'), $request->input('science'), $request->input('history')]);
        $studentMark->save();
    }

    /**
     * Get Student data by id
     * 
     * @param Integer $id
     * @return Object $studentMark
     */

    public function find($id) {
        return studentmark::where('id', $id)->first();
    }


     /**
     * Update studentMark data
     * 
     * @param Object $request
     * @return Object $studentMark
     */
    public function update($request){
        return studentmark::where('id', $request->id)->update([
            'student_id' => $request->input('student_id'),
            'maths' => $request->input('maths'),
            'science' => $request->input('science'),
            'history' => $request->input('history'),
            'term' => $request->input('term'),
            'total_mark' => $this->calculateTotalMarks([$request->input('maths'), $request->input('science'), $request->input('history')]),
        ]);
    }


     /**
     * Delete studentMark data
     * 
     * @param Integer $id
     * @return Void
     */
    public function delete($id)  {
        $studentMark = studentmark::findOrFail($id);
        $studentMark->delete();
    }


     /**
     * Calculate student total marks
     * 
     * @param Array $$marks
     * @return Integer $totalMarks
     */
    private function calculateTotalMarks(Array $marks)
    {
        return array_sum($marks);
    }
}
?>
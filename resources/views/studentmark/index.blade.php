@extends('layout.master_layout')
@section('content')
@section('title', 'Student Marks')
<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row">
        <div class="col-md-12 p-4 ">
            <a href="{{ route('createMark')}}" class="btn btn-primary btn-sm float-right">Create Student Mark </a>
            <a href="{{ route('student')}}" class="btn btn-primary btn-sm float-right mr-2">Student</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr class="">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Maths</td>
                        <td>Science</td>
                        <td>History</td>
                        <td>Term</td>
                        <td>Total Marks</td>
                        <td>Created On</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
            <tbody>
                    @if (count($studentMarks) > 0)
                        @foreach ($studentMarks as $key => $studentMark)
                            <tr class="">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $studentMark->student->name }}</td>
                                <td>{{ $studentMark->maths }}</td>
                                <td>{{ $studentMark->science }}</td>
                                <td>{{ $studentMark->history }}</td>
                                <td>{{ $studentMark->student_term->name }}</td>
                                <td>{{ $studentMark->total_mark }}</td>
                                <td>{{ $studentMark->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('editMark', $studentMark->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('deleteMark', $studentMark->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr class="" >
                        <td colspan="9">No data found.</td>
                    </tr>
                    @endif
                   
            </tbody>
          </table>
          {{ $studentMarks->links( "pagination::bootstrap-4") }}
        </div>
    </div>
 
<div>
@endsection
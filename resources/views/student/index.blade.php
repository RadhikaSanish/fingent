@extends('layout.master_layout')
@section('content')
@section('title', 'Student')
<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row">
        <div class="col-md-12 p-4 ">
            <a href="{{ route('createStudent')}}" class="btn btn-primary btn-sm float-right">Create Student</a>
            <a href="{{ route('mark')}}" class="btn btn-primary btn-sm float-right mr-2">Mark List</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr class="">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Reporting Teacher</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
            <tbody>
                    @if (count($students) > 0)
                        @foreach ($students as $key => $student)
                            <tr class="">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->teacher->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('editStudent', $student->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('deleteStudent', $student->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr class="" >
                        <td colspan="6">No data found.</td>
                    </tr>
                    @endif
                   
            </tbody>
          </table>
          {{ $students->links( "pagination::bootstrap-4") }}
        </div>
    </div>
 
<div>
@endsection
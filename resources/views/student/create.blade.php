@extends('layout.master_layout')
@section('content')
@section('title', 'Create Student')
<div class="card push-top">
    <div class="card-header">
        Add Student
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        <form method="post" action="{{ route('storeStudent') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="100" value="{{ old('name') }}"/>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" name="age" id="age" maxlength="2" value="{{ old('age') }}"/>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="M" value="{{ old('gender') }}" {{ (old('gender') == "M")? "checked" : "" }}>
                <label class="form-check-label" for="gender">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="F" value="{{ old('gender') }}" {{ (old('gender') == "F")? "checked" : "" }}>
                <label class="form-check-label" for="gender">Female</label>
            </div>
            <div class="form-group mt-2 mb-0">
                <label for="reporting_teacher_id">Reporting Teacher</label>
            </div>
            <div class="form-group mt-0">
                <select class="form-select form-control" name="reporting_teacher_id" id="reporting_teacher_id">
                    <option value="">Select</option>
                    @foreach ($teachers as $teacher )
                        @if(old('reporting_teacher_id') == $teacher->id)
                            <option  value="{{ $teacher->id }}" selected="selected">{{ $teacher->name }}</option>
                        @else
                            <option  value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <a href="{{ route('student')}}" class="btn btn-primary btn-sm">Cancel</a>
            <button type="submit" class="btn btn-danger btn-sm">Create Student</button>
        </form>
    </div>
</div>
@endsection
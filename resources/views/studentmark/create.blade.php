@extends('layout.master_layout')
@section('content')
@section('title', 'Create Student Mark')
<div class="card push-top">
	<div class="card-header">
		Add Student Mark
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
		<form method="post" action="{{ route('storeMark') }}">
			@csrf
			<div class="form-group mt-2 mb-0">
				<label for="password">Student</label>
			</div>
			<div class="form-group mt-0">
				<select class="form-select form-control" name="student_id" id="student_id">
					<option value="">Select</option>
					@foreach ($students as $student )
						@if(old('student_id') == $student->id)
							<option  value="{{ $student->id }}" selected="selected">{{ $student->name }}</option>
						@else
							<option  value="{{ $student->id }}">{{ $student->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group m-0">             
				<label><b>Marks</b></label>
				<hr>
			</div>
			<div class="form-group">             
				<label for="name">Maths</label>
				<input type="text" class="form-control" name="maths" id="maths" maxlength="5" value="{{ old('maths') }}"/>
			</div>
			<div class="form-group">
				<label for="age">Science</label>
				<input type="text" class="form-control" name="science" id="science" maxlength="5" value="{{ old('science') }}"/>
			</div>
			<div class="form-group">
				<label for="age">History</label>
				<input type="text" class="form-control" name="history" id="history" maxlength="5" value="{{ old('history') }}"/>
			</div>
			<hr>
			<div class="form-group">
				<label for="age">Term</label>
				<select class="form-select form-control" name="term" id="term">
					<option value="">Select</option>
					@foreach ($terms as $term )
						@if(old('term') == $term->id)
							<option  value="{{ $term->id }}" selected="selected">{{ $term->name }}</option>
						@else
							<option  value="{{ $term->id }}">{{ $term->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			
			<a href="{{ route('mark')}}" class="btn btn-primary btn-sm">Cancel</a>
			<button type="submit" class="btn btn-danger btn-sm">Create Student Mark</button>
		</form>
  </div>
</div>
@endsection
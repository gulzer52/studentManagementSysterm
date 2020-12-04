@extends('layout.default')
@section('content')
<h2>View Courses</h2>
<table class="table table-striped">
	<thead>
		<td>Branch Name</td>
		<td>Course Name</td>
		<td>Action</td>
	</thead>
	<tbody>
		@foreach($courses as $course)
		<tr>
			<td>{{$course->bfull}}</td>
			<td>{{$course->cname}}</td>
			<td>
				<a href="" class="btn btn-primary">Edit</a>
				<a href="" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection
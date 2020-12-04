@extends('layout.default')
@section('content')
<h2>View Branch</h2>
<table class="table table-striped">
	<thead>
		<td>Branch Sort Name</td>
		<td>Branch Full Name</td>
		<td>Action</td>
	</thead>
	<tbody>
		@foreach($branches as $branch)
		<tr>
			<td>{{$branch->bsort}}</td>
			<td>{{$branch->bfull}}</td>
			<td>
				<a href="{{route('branch.edit',['id'=> $branch->id])}}" class="btn btn-primary">Edit</a>
				<a href="{{route('branch.delete',['id'=> $branch->id])}}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection
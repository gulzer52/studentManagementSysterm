@foreach($students as $student)
<tr>
	<td>{{$student->sname}}</td>
	<td>{{$student->fname}}</td>
	<td>{{$student->class}}</td>
	<td>{{$student->phone}}</td>
	<td>{{$student->email}}</td>
	<td>
		<a href="{{route('student.edit',['id'=> $student->id])}}" class="btn btn-primary">Edit</a>
		<a href="{{route('student.delete',['id'=> $student->id])}}" class="btn btn-primary">Delete</a>
	</td>
</tr>
@endforeach
<tr class="pag_link"><td colspan="7">{{$students->links()}}</td></tr>
@extends('layout.default')
@section('content')
<h2>Student Details</h2>
<input type="text" id="student_search" placeholder="search for.....">

<table class="table table-striped scontent">
	<thead>
		<th class="exam_sorting" data-sorting_type="asc" data-column_name="sname" style="cursor: pointer;">Student Name</th>
		<th class="exam_sorting" data-sorting_type="asc" data-column_name="fname" style="cursor: pointer;">Father's Name</th>
		<th>Class</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Action</th>
	</thead>
	<tbody>
		@include('studentdetails_ajax')
	</tbody>
</table>

<input type="hidden" name="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" value="id">
<input type="hidden" name="hidden_sort_type" value="asc">
@endsection

@push('footer-scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			function fetch_data(page, sort_type="", sort_by="", search=""){
				$.ajax({
					url:"<?php echo url('') ?>/studentdetails-ajax?page="+page+"&sorttype="+sort_type+"&sortby="+sort_by+"&search="+search,
					success:function(data){
						$('.scontent tbody').html(data);
					}
				})
			}

			$(document).on('keyup','#student_search',function(){
				var search = $('#student_search').val();
				var column_name = $('#hidden_column_name').val();
				var sort_type = $('#hidden_sort_type').val();
				var page = $('#hidden_page').val();
				fetch_data(page, sort_type, column_name, search);
			});


			$(document).on('click','.exam_sorting',function(){
				var column_name = $(this).data('column_name');
				var order_type = $(this).data('sorting_type');
				var reverse_order = "";
				if (order_type == 'asc') {
					$(this).data('sort_type','desc');
					reverse_order = 'desc';
				}else{
					$(this).data('sort_type','asc');
					reverse_order = 'asc';
				}
				$('#hidden_column_name').val('column_name');
				$('#hidden_sort_type').val('reverse_order');
				var page = $('#hidden_page').val();
				var search = $('#student_search').val();
				fetch_data(page, sort_type, column_name, search);
			});

			$(document).on('click','.pag_link a',function(e){
				e.preventDefault();
				var search = $('#student_search').val();
				var column_name = $('#hidden_column_name').val();
				var sort_type = $('#hidden_sort_type').val();
				var page = $(this).attr('href').split('page=')[1];
				fetch_data(page, sort_type, column_name, search);
			});
		});
	</script>
@endpush
@extends('layout.default')

@section('content')
<h1>Student Register Page</h1>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <br />
        <form method="post" action="{{url('studentstore')}}" class="form-horizontal form-label-left" enctype="multipart/form-data">
        	@csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sname">Student Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="sname" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Father's Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="fname" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="class" class="control-label col-md-3 col-sm-3 col-xs-12">Class</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="class" class="form-control col-md-7 col-xs-12" type="text" name="class">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="phone" required="required" name="phone" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="first-name" name="email" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Branche <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="date-picker form-control col-md-7 col-xs-12 branches" name="branch_id">
                <option>Select Branch</option>
                 @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->bfull}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Course<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="date-picker form-control col-md-7 col-xs-12 courses" name="course_id">
                <option>Select Course</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
			  <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('footer-scripts')
  <script type="text/javascript">
    $(document).on('change','.branches',function(){
      branch_id = $(this).val();
      $.ajax({
        url: 'student/courses',
        dataType: "json",
        data: {"id":branch_id,"_token": "{{csrf_token()}}"},
        method: "post",
        success: function(data){
          var courses = '<select>Select Course</select>';
          var arr = data.courses.length;
          var aa = data.courses;
          for(var i=0;i<arr;i++){
            courses += '<option value="'+aa[i].id+'">'+aa[i].cname+'</option>';
          }
          $(".courses").html(courses);
        }
      });
    });
  </script>
@endpush
@extends('schooladmin.layout.index')
@section('title','Dashboard')
@section('content')
<div class="app-content content container-fluid load">
    <div class="content-wrapper data">
      <div class="content-header row"></div>
      	<div class="content-body">       
        	<div class="row">
          		<div class="col-xl-3 col-lg-6 col-xs-12">
            		<div class="card">
              			<div class="card-body">
                			<div class="media">
                  				<div class="p-2 bg-gradient-x-primary white media-body">
                    				<h5>School Admin Dashboard</h5>
                    				<h5 class="text-bold-400"></h5>
                  				</div>
               				</div>
              			</div>
            		</div>
          		</div>
        </div>
        <div class="row">
          <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th class="text-md-center">#</th>
                          <th>School</th>
                          <th class="text-md-center">Courses</th>
                          <th class="text-md-center">Transport</th>
                          <th class="text-md-center">Accommodation</th>
                          <th class="text-md-center">Bookings</th>
                          <th class="text-md-center">Add Language Data</th>
                          <th class="text-md-center">Edit</th>
                          <th class="text-md-center">Live</th>
                          <th class="text-md-center">Deactive Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($schools as $school)   
                        <tr>
                          <td class="text-md-center">{{$loop->iteration}}</td>         
                          <td>{{$school->name}} \ {{$school->city}}</td>
                          <td class="text-md-center">{{$school->courseCount}}</td>

                          <td class="text-md-center"><?php if($school->schooltransportCount == 0){ echo '<i class="fa fa-times"></i>'; }else{ echo '<i class="fa fa-check"></i>';} ?></td>
                          <td class="text-md-center">{{$school->accommodationCount}}</td>
                           <td class="text-md-center"><a href="{{route('showCourseBookings',['id'=>$school->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-eye"></i></button></td>
                          <td class="text-md-center"><a href="{{route('showLangSchool',['id'=>$school->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-plus"></i></button></td> 
                          <td class="text-md-center"><a href="{{route('editSchool',['id'=>$school->id])}}"><button type="button" class="btn btn-outline-warning" ><i class="fa fa-pencil"></i></button></a></td>    
                          <td class="text-md-center"><?php if($school->status == 0){ echo "Not Publish"; }else{ echo "Publish";} ?>
                          <td class="text-md-center"><button type="button" class="btn btn-outline-warning" onclick="deleteSchool({{$school->id}},'{{$school->name}}')">@if($school->deactiveStatus == 0){{"Active"}} @else{{"Deactive"}}@endif</button></td>
                        </tr>
                      @endforeach
                      </tbody>
                      
                    </table>
        </div>
	</div>
	</div>
</div>
<div class="modal fade text-xs-left" id="deleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Change delete Status</label>
      </div>
      <form action="{{route('deleteSchool')}}" id="deleteSchoolForm" method="post" novalidate>
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to change delete Status of this School <span id="text"></span>?</h4>
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deleteSchool" value="Yes">
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  
function deleteSchool(id,name)
{
  var name = $('#deleteForm').find('#text').text(name);
  var id = $('#deleteForm').find('#id').val(id);
  $("#deleteForm").modal("show");
}

 $('#deleteSchool').click(function(e)
 {

 e.preventDefault();

  var deleteSchoolForm = $("#deleteSchoolForm")[0];
  var formData = new FormData(deleteSchoolForm);
  var action = $("#deleteSchoolForm").attr('action');
  
  $.ajax
  ({
    type: "post",   
    url: action,             
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"html",
    success:function(data)
    {      
      if(data == 1)
      {
        toastr.success("You'r successfully changed delete status of school", "Great !");
        $('#deleteSchoolForm')[0].reset();
        $("#deleteForm").modal('hide');
        var url = $(location).attr('href');
        $('.load').load(url+ ' .data');
        $('.load').load(url+ ' .data', function()
        {
          $('.zero-configuration').DataTable();
        });
      }
      else
      {
        toastr.error("Error Occur, Try Again", "Oops !");
      }      
    },    
  }); 
 });

 
</script>
@endsection
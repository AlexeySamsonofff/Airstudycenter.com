@extends('schooladmin.layout.index')
@section('title','Course')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Course Name : {{$courseTitle->name}}</h3>
        	<h3 class="content-header-title mb-0">All Course Prices</h3> 
    	</div>  
    	</div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-xs-12">
              <div class="card" style="overflow:scroll;">
                <div class="card-body collapse in">
                  <div class="card-block card-dashboard">                    
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Hours/Week</th>
                          <th>ppw1</th>
                          <th>ppw2</th>
                          <th>ppw3</th>
                          <th>ppw4</th>
                          <th>ppw5</th>
                          <th>ppw6</th>
                          <th>ppw7</th>
                          <th>ppw8</th>
                          <th>ppw9</th>
                          <th>ppw10</th>
                          <th>ppw11</th>
                          <th>ppw12</th>
                          <th>ppw13</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($coursesprice as $course)   
                        <tr>
                          <td>{{$loop->iteration}}</td>         
                          <td>{{$course->hours_per_week}}</td>
                          <td>{{$course->ppw1}}</td>
                          <td>{{$course->ppw2}}</td>
                          <td>{{$course->ppw3}}</td>
                          <td>{{$course->ppw4}}</td>
                          <td>{{$course->ppw5}}</td>
                          <td>{{$course->ppw6}}</td>
                          <td>{{$course->ppw7}}</td>
                          <td>{{$course->ppw8}}</td>
                          <td>{{$course->ppw9}}</td>
                          <td>{{$course->ppw10}}</td>
                          <td>{{$course->ppw11}}</td>
                          <td>{{$course->ppw12}}</td>
                          <td>{{$course->ppw13}}</td>
                          <td><a href="{{route('editcourseprices',['id'=>$course->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></button></a></td> 
                          <td><button type="button" class="btn btn-outline-warning" onclick="deleteCourse({{$course->id}},'{{$course->name}}')"><i class="fa fa-trash"></i></button></td> 
                         
                        </tr>
                      @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Delete Course Price</label>
      </div>
      <form action="{{route('destroycourseprices')}}" id="deleteCourseForm" method="post" novalidate>
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to delete this Course Price <span id="text"></span>?</h4>
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deleteCourse" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  
function deleteCourse(id,name)
{
  var name = $('#deleteForm').find('#text').text(name);
  var id = $('#deleteForm').find('#id').val(id);
  $("#deleteForm").modal("show");
}

 $('#deleteCourse').click(function(e)
 {

 e.preventDefault();

  var deleteSchoolForm = $("#deleteCourseForm")[0];
  var formData = new FormData(deleteSchoolForm);
  var action = $("#deleteCourseForm").attr('action');
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
        toastr.success("You'r successfully deleted course", "Great !");
        $('#deleteCourseForm')[0].reset();
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
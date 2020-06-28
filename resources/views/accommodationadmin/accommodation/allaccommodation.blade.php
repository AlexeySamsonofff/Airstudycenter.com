@extends('accommodationadmin.layout.index')
@section('title','Accommodation')
@section('content')
<div class="app-content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
        	<h3 class="content-header-title mb-0">All Accommodations</h3>  
    	</div>  
    	
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-body collapse in">
                  <div class="card-block card-dashboard">                    
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>View Price</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($accommodations as $accommodation)   
                        <tr>
                          <td>{{$loop->iteration}}</td>         
                          <td>{{$accommodation->name}}</td>
                           <td><a href="{{route('editAccommodation',['id'=>$accommodation->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></button></a></td>  
                          <td><a href="{{route('allAccommodationPrice',['accommodation_id'=>$accommodation->id])}}"><button type="button" class="btn btn-outline-warning" >View</button></a></td>
                          <td><button type="button" class="btn btn-outline-warning" onclick="deleteSchool({{$accommodation->id}})"><i class="fa fa-trash"></i></button></td>    
                         
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
</div>

<div class="modal fade text-xs-left" id="deleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Delete Accommodation</label>
      </div>
      <form action="{{route('destroyAccommodation')}}" id="deleteAccommodationForm" method="post" novalidate>
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to delete this Accommodation <span id="text"></span>?</h4>
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deleteAccommodation" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  
function deleteSchool(id)
{
  var id = $('#deleteForm').find('#id').val(id);
  $("#deleteForm").modal("show");
}

 $('#deleteAccommodation').click(function(e)
 {

 e.preventDefault();

  var deleteSchoolForm = $("#deleteAccommodationForm")[0];
  var formData = new FormData(deleteSchoolForm);
  var action = $("#deleteAccommodationForm").attr('action');
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
        toastr.success("You'r successfully deleted Accommodation", "Great !");
        $('#deleteAccommodationForm')[0].reset();
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
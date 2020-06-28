@extends('schooladmin.layout.index')
@section('title','Dashboard')
@section('content')
<div class="app-content content container-fluid load">
  <div class="content-wrapper data">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Accommodation Name : </h3>
          <h3 class="content-header-title mb-0">All School Accommodation Prices</h3> 
      </div>  
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
                          <th>Accommodation Type</th>
                          <th>Price</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <td>1</td>         
                          <td>@if($schoolaccprice){{$schoolaccprice->type_name}} @endif</td>
                          <td>@if($schoolaccprice){{$schoolaccprice->price}}@endif</td>
                          <td>@if($schoolaccprice)<a href="{{route('editSchoolAccommodationPrice',['id'=>$schoolaccprice->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></button></a>@endif</td> 
                          <td>@if($schoolaccprice)<button type="button" class="btn btn-outline-warning" onclick="deleteAccommodationPrice({{$schoolaccprice->id}})"><i class="fa fa-trash"></i></button>@endif</td>
                        </tr> 
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
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Delete Accommodation Price</label>
      </div>
      <form action="{{route('destroySchoolAccommodationPrice')}}" id="deleteSchoolAccommodationForm" method="post" novalidate>
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to delete this price <span id="text"></span>?</h4>
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deleteSchoolAccommodation" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  
function deleteAccommodationPrice(id)
{
  var id = $('#deleteForm').find('#id').val(id);
  $("#deleteForm").modal("show");
}

 $('#deleteSchoolAccommodation').click(function(e)
 {

 e.preventDefault();

  var deleteSchoolForm = $("#deleteSchoolAccommodationForm")[0];
  var formData = new FormData(deleteSchoolForm);
  var action = $("#deleteSchoolAccommodationForm").attr('action');
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
        toastr.success("You'r successfully deleted price", "Great !");
        $('#deleteSchoolAccommodationForm')[0].reset();
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
@extends('accommodationadmin.layout.index')
@section('title','Dashboard')
@section('content')
<div class="app-content container-fluid load">
    <div class="content-wrapper data">
      <div class="content-header row"></div>
        <div class="content-body">       
          <div class="row">
              <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                      <div class="media">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h5>Accommodation Admin Dashboard</h5>
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
                          <th class="text-md-center">Accommodation</th>
                          <th class="text-md-center">Accommodation Type</th>
                          <th class="text-md-center">Publish/Unpublish</th>
                          <th class="text-md-center">Bookings</th>
                          <th class="text-md-center">Edit</th>
                          <th class="text-md-center">Add Language Data</th>
                          <th class="text-md-center">Deactive Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($accommodations as $accommodation)
                        <tr>
                          <td class="text-md-center">{{$loop->iteration}}</td>         
                          <td class="text-md-center">{{$accommodation->name}}</td>
                          <td class="text-md-center">{{$accommodation->acc_type}}</td>
                          <td class="text-md-center">@if($accommodation->status == 0) Unpublish @else Publish @endif</td>
                          <td class="text-md-center"><a href="{{route('showaccommodationbookings',['id'=>$accommodation->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-eye"></i></button></td>
                          <td class="text-md-center"><a href="{{route('editAccommodation',['id'=>$accommodation->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></button></td>
                          <td class="text-md-center"><a href="{{route('showLangAccommodation',['id'=>$accommodation->id])}}"><button type="button" class="btn btn-outline-warning"><i class="fa fa-plus"></i></button></td> 
                          <td class="text-md-center"><button type="button" class="btn btn-outline-warning" onclick="deleteAccommodation({{$accommodation->id}})">@if($accommodation->deactiveStatus == 0){{"Active"}} @else{{"Deactive"}}@endif</i></button></td>  
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
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Change Deactive Status Accommodation</label>
      </div>
      <form action="{{route('destroyAccommodation')}}" id="deleteAccommodationForm" method="post" novalidate>
        @csrf
        <div class="modal-body">
          <h4>Are you sure want to Change deactive status Of this Accommodation <span id="text"></span>?</h4>
          <input type="hidden" id="id" name="id">
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="deleteAccommodation" value="Yes">
        </div>
      </form>
    </div>
  </div>
</div>



<script>
function deleteAccommodation(id)
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
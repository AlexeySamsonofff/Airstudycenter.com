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
                            <h5>{{$school_name->name}} Booking Dashboard</h5>
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
                          <th class="text-md-center">Username</th>
                          <th class="text-md-center">Coursename</th>
                          <th class="text-md-center">Hours Per Week</th>
                          <th class="text-md-center">Accommodation</th>
                          <th class="text-md-center">Accommodation Price</th>
                          <th class="text-md-center">Transport</th>
                          <th class="text-md-center">Transport Price</th>
                          <th class="text-md-center">Registration Fee</th>
                          <th class="text-md-center">Payment Status</th>
                          <th class="text-md-center">Total payment</th>
                          <th class="text-md-center">Receipt Url</th>
                          <th class="text-md-center">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($coursebookings as $booking)
                        <tr>
                          <td class="text-md-center">{{$loop->iteration}}</td> 	
                          <td class="text-md-center">{{$booking->user_name}}</td>
                          <td class="text-md-center">{{$booking->course_name}}</td>
                          <td class="text-md-center">{{$booking->hours_per_week}}</td>

                          <td class="text-md-center"> @if($booking->accommodation){{$booking->accommodation}}@else No @endif</td>
                          <td class="text-md-center">@if($booking->accommodation_price){{$booking->accommodation_price}}@else No @endif</td>
                          <td class="text-md-center">@if($booking->airport){{$booking->airport}}@else No @endif</td>
                          <td class="text-md-center">@if($booking->transport_price){{$booking->transport_price}}@else No @endif</td>
                          <td class="text-md-center">{{$booking->registration_fee}}</td>
                          <td class="text-md-center">{{$booking->payment_status}}</td>
                          <td class="text-md-center">£{{$booking->total_course_price}}</td>
                          <td class="text-md-center"><a href="{{$booking->receipt_url}}" target="_blank">Check</a></td>
                          <td class="text-md-center">{{$booking->created_at}}</td>          
                        </tr>
                        @endforeach
                    
                      </tbody>
                      
                    </table>
        </div>
  </div>
</div>
</div>


@endsection
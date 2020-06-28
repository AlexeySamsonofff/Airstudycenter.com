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
                            <h5>{{$accommodation_name->name}} Booking Dashboard</h5>
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
                          <th class="text-md-center">Accommodation Type</th>
                          <th class="text-md-center">Type</th>
                          <th class="text-md-center">Catering</th>
                          <th class="text-md-center">Payment Status</th>
                          <th class="text-md-center">Total payment</th>
                          <th class="text-md-center">Receipt Url</th>
                          <th class="text-md-center">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($accobookings as $booking)
                        <tr>
                          <td class="text-md-center">{{$loop->iteration}}</td> 	
                          <td class="text-md-center">{{$booking->username}}</td>
                          <td class="text-md-center">{{$booking->accoType}}</td>
                          <td class="text-md-center">{{$booking->typename}}</td>
                          <td class="text-md-center">@if($booking->accFood == 'pricewith') Self Catering @else Without Catering @endif</td>
                          <td class="text-md-center">{{$booking->paymentStatus}}</td>
                          <td class="text-md-center">£{{$booking->price}}</td>
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
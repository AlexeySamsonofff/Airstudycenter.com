@extends('front.index1')
@section('title', 'User Profile')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<div style="background-color: #373f50; color:white;">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h2 style="font-weight: bold;padding-top: 30px">Payment history</h2>
	                </div>
	            </div>
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h6 style="font-weight: bold;padding: 30px 0px 20px 455px"></h6>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="row">
		@include('front.myaccount_leftside')
		<div class="col-md-8 content-desktop" style="margin-top: 50px; margin-bottom: 100px;">
			<table class="table">
			  	<thead class="thead-dark">
				    <tr>
				      	<th>Date</th>
				      	<th>Details</th>
				      	<th>Start Date</th>
				      	<th>End Date</th>
				      	<th>Amount</th>
				      	<th>Ref.No</th>
				      	<th></th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		@foreach($payments as $payment)
				    <tr>
				      	<td>{{date_format(date_create($payment->created_at),'d/m/y')}}</th>
				      	<td>{{$payment->details}}</td>
				      	<td>{{date_format(date_create($payment->start_date),'d/m/y')}}</td>
				      	<td>{{date_format(date_create($payment->end_date),'d/m/y')}}</th>
				      	<td>{{$payment->amount}}</td>
				      	<td>{{$payment->ref_id}}</td>						
						<td>
						@if($payment->details =="Course Booking Payment From Air study")
						<a href="{{route('generatepdf',['id'=>$payment->ref_id])}}"><i class="fa fa-download"></i></a>
						@else
						<a href="{{route('generateaccpdf',['id'=>$payment->ref_id])}}"><i class="fa fa-download"></i></a>
						@endif
						</td>
				    </tr>
				    @endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-8 content-mobile" style="margin-top: 50px; margin-bottom: 100px;padding-left: 25px;padding-right: 25px">
			<table class="table">
			  	<thead class="thead-dark">
				    <tr>
				      	<th style="padding: 5px;">Date</th>
				      	<th style="padding: 5px;">Details</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		@foreach($payments as $payment)
				    <tr>
				      	<td style="padding: 5px;color:#8398B6">{{date_format(date_create($payment->created_at),'d/m/y')}}</th>
				      	<td style="padding: 5px;"><strong>{{$payment->details}}</strong><br>{{$payment->details_sub}}</td>
					</tr>
					<tr>
						<td style="padding: 5px;">Start date</td>
						<td style="padding: 5px;color:#8398B6">{{date_format(date_create($payment->start_date),'d/m/y')}}</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-width: 0px;">End date</td>
						<td style="padding: 5px;border-width: 0px;color:#8398B6">{{date_format(date_create($payment->end_date),'d/m/y')}}</th>
					</tr>
					<tr>
						<td style="padding: 5px;border-width: 0px;">Amount</td>
						<td style="padding: 5px;border-width: 0px;color:#8398B6">{{$payment->amount}}</td>
					</tr>
					<tr>
						<td style="padding: 5px;border-width: 0px;">Ref no</td>
						<td style="padding: 5px;border-width: 0px;color:#8398B6">{{$payment->ref_id}}</td>
					</tr>
					<tr style="border-color: #2A354F;border-bottom: 1px solid;">
						<td style="padding: 5px;border-top: 0px;"><i class="fa fa-download"></i></td>
						<td style="padding: 5px;border-top: 0px;"></td>
				    </tr>
				    @endforeach
					<tr style="background-color: #343a40;">
						<td></td>
						<td></td>
				    </tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
	</div>
</div>
@endsection
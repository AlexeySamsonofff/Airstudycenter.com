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
	                    <h2 style="font-weight: bold;padding-top: 30px">My credits</h2>
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
		<div class="col-md-1"></div>
		<div class="col-md-7 content-desktop" style="margin-top: 50px; margin-bottom: 100px;">
			<table class="table">
			  	<thead class="thead-dark">
				    <tr>
				      	<th>Fullname</th>
				      	<th>Email</th>
				      	<th>Points earned</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		@foreach($credits as $credit)
				    <tr>
				      	<td>{{$credit->name}}</th>
				      	<td>{{$credit->email}}</td>
				      	<td>{{$credit->points}}</td>
				    </tr>
				    @endforeach
				</tbody>
			    <thead class="thead-dark">
				    <tr>
				      	<th> </th>
				      	<th>Total</th>
				      	<th>{{$total}}</th>
				    </tr>
			    </thead>
			</table>
		</div>
		<div class="col-md-7 content-mobile" style="margin-top: 50px; margin-bottom: 100px;">
			<table class="table">
			  	<thead class="thead-dark">
				    <tr>
				      	<th style="width: 30%">Fullname</th>
				      	<th>Email</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		@foreach($credits as $credit)
				    <tr>
				      	<td style="width: 30%">{{$credit->name}}</th>
				      	<td>{{$credit->email}}</td>
				    </tr>
				    <tr>
				      	<td>{{$credit->points}}</th>
				    </tr>
				    @endforeach
				</tbody>
			    <thead class="thead-dark" style="text-align: center">
				    <tr>
				      	<th colspan="2"><b>Total&nbsp;&nbsp;&nbsp;&nbsp;{{$total}}</b></th>
				    </tr>
			    </thead>
			</table>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
	</div>
</div>
@endsection
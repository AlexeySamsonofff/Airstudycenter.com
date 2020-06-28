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
	                    <h2 class="left-menu-title" style="font-weight: bold;padding-top: 30px">Inbox</h2>
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
        <div class="col-md-7 inbox-content" style="margin-top: 50px; margin-bottom: 100px;">
        <style type="text/css">
				.inbox-border-green {
				  	border-color:rgba(3, 127, 145, 0.3);
					border-left-color:#037f91;
					border-top-style: solid;
					border-top-width: 0.2px;
					border-bottom-style: solid;
					border-left-style: solid;
					border-left-width:5px;
					border-bottom-width: 0.2px;
				}
				.inbox-border-trans {
				  	border-color:rgba(3, 127, 145, 0);
					border-left-color:#0;
					border-top-style: solid;
					border-top-width: 0.2px;
					border-bottom-style: solid;
					border-left-style: solid;
					border-left-width:5px;
					border-bottom-width: 0.2px;
				}
            </style>
            	<?php 
                if (Auth::check()) {
                    $id = auth::user()->id;
                    $user_name =DB::table('users')->select('name')->where('id',$id)->first();
                }
                ?>
                @foreach($send_data as $v_info)
                <div class="row inbox-border-green" style="padding-top: 20px;" data-toggle="collapse" href="#" role="button" aria-expanded="false">
                    <div class="col-2"  style="vertical-align: center">
                        
                    </div>
                    <div class="col-3">
                       {{$user_name->name}}
                    </div>
                    <div class="col-6">
                        <a href="{{url('/inbox/view_receive/'.$v_info->id )}}"><strong>title</strong></a>
                        <p>{{ substr($v_info->message, 0,32).' ... '}}</p>
                    </div>
                    
                    <div class="col-1">
                        <h2><i class="fa fa-angle-right"></i></h2>
                    </div>
                    
                </div>
			
				@endforeach
				
			
			<div class="row m-0">
	        	<div class="col-lg-12">
	            	<nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
	                    
	                </nav>
	            </div>
	        </div>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
		
		
	</div>
</div>
@endsection
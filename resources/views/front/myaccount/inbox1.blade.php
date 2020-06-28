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
			<?php function ago($time){
									$now=time();
									$send_date = strtotime($time);
									$interval = $now - $send_date;
									$y=round($interval/(60*60*24*365));
									$m=round($interval/(60*60*24*30));
									$d=round($interval/(60*60*24));
									$h=round($interval/(60*60));
									$i=round($interval/(60));
									$suffix=($interval > 0 ? ' ago':'');
									if($y >= 1) return $y.(($y == 1)?(" year"):(" years")).$suffix;
									if($m >= 1) return $m.(($m == 1)?(" month"):(" months")).$suffix;
									if($d >= 1) return $d.(($d == 1)?(" day"):(" days")).$suffix;
									if($h >= 1) return $h.(($h == 1)?(" hour"):(" hours")).$suffix;
									if($i >= 1) return $i.(($i == 1)?(" minute"):(" minutes")).$suffix;
									}
			?>
			@for ($i = 0; $i < count($emails) ; $i++)
			@if ($i % 2 == 0)
			<div class="row inbox-border-green" style="padding-top: 20px;" data-toggle="collapse" href="#s{{$emails[$i]->id}}" role="button" aria-expanded="false">
				<div class="col-2"  style="vertical-align: center">
					<img src="{{asset('/normal_images/'.$emails[$i]->image)}}" alt="Avatar" class="rounded-circle" style="width: 60px;height: 60px;object-fit: scale-down !important">
		        </div>
		        <div class="col-3">
		            <strong>{{$emails[$i]->sender}}</strong>
		            <p><?php echo ago($emails[$i]->send_date);?></p>
		        </div>
		        <div class="col-6">
		            <a href="{{url('/inbox/view_receive/'.$emails[$i]->id )}}"><strong>{{substr($emails[$i]->title, 0,32).' ...'}}</strong></a>
		            <p>{{substr($emails[$i]->content, 0, 32).' ...'}}</p>
		        </div>
		        
		        <div class="col-1">
		            <h2><i class="fa fa-angle-right"></i></h2>
		        </div>
	        	<div class="collapse multi-collapse" id="s{{$emails[$i]->id}}" style="padding-left: 28px">
	        		<div class="row">
			        	<div class="col-md-5">
			        		<div class="row">
				        		@if($emails[$i]->sender_email == $userprofile->email)
				        		<div class="col-md-2">
				        			<strong>To:</strong>
				        		</div>
				        		<div class="col-md-6">
				        			<p>{{$emails[$i]->receiver}}</p>
				        		</div>
				        		@else
				        		<div class="col-md-2">
				        			<strong>From:</strong>
				        		</div>
				        		<div class="col-md-6">
				        			<p>{{$emails[$i]->sender}}</p>
				        		</div>
				        		@endif
				        		<div class="col-md-12">
				        			<p>{{$emails[$i]->send_date}}</p>
				        		</div>
				        	</div>
			        	</div>
			        	<div class="col-md-6">
			        		<div class="row">
					            <strong>{{$emails[$i]->title}}</strong>
					            <p>{{$emails[$i]->content}}</p>
					        </div>
				        </div>
			        </div>
			    </div>
			</div>
			@else
			<div class="row inbox-border-trans" style="padding-top: 20px;" data-toggle="collapse" href="#s{{$emails[$i]->id}}" role="button" aria-expanded="false">
				<div class="col-2">
					<img src="{{asset('/normal_images/'.$emails[$i]->image)}}" alt="Avatar" class="rounded-circle" style="width: 60px;height: 60px;object-fit: scale-down !important">
		        </div>
		        <div class="col-3">
		            <strong>{{$emails[$i]->sender}}</strong>
		            <p><?php echo ago($emails[$i]->send_date); ?></p>
		        </div>
		        <div class="col-6">
		            <a href="#"><strong>{{substr($emails[$i]->title, 0,32).' ...'}}</strong></a>
		            <p>{{substr($emails[$i]->content, 0, 32).' ...'}}</p>
		        </div>
		        <div class="col-1">
		            <h2><i class="fa fa-angle-right"></i></h2>
		        </div>
		        <div class="collapse multi-collapse" id="s{{$emails[$i]->id}}" style="padding-left: 28px">
	        		<div class="row">
			        	<div class="col-md-5">
			        		<div class="row">
				        		@if($emails[$i]->sender_email == $userprofile->email)
				        		<div class="col-md-2">
				        			<strong>To:</strong>
				        		</div>
				        		<div class="col-md-6">
				        			<p>{{$emails[$i]->receiver}}</p>
				        		</div>
				        		@else
				        		<div class="col-md-2">
				        			<strong>From:</strong>
				        		</div>
				        		<div class="col-md-6">
				        			<p>{{$emails[$i]->sender}}</p>
				        		</div>
				        		@endif
				        		<div class="col-md-12">
				        			<p>{{$emails[$i]->send_date}}</p>
				        		</div>
				        	</div>
			        	</div>
			        	<div class="col-md-6">
			        		<div class="row">
					            <strong>{{$emails[$i]->title}}</strong>
					            <p>{{$emails[$i]->content}}</p>
					        </div>
				        </div>
			        </div>
			    </div>
			</div>
			@endif
			@endfor
			<div class="row m-0">
	        	<div class="col-lg-12">
	            	<nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
	                    {{ $emails->links() }}
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
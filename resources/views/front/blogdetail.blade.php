@extends('front.index1')
@section('title', 'All School')
@section('content')
<section class="courses_sec city_school">
	<div class="container">
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="cus_title acc_head ">
					<h1 class="distance">@lang('blog.blog')</h1>
					<ul>
						<li><a href="{{route('mainhome')}}">@lang('blog.home')</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>@lang('blog.blog')</li>
					</ul>
				</div> 
			</div>
		</div>	
	</div>
</section>
<!--Blog Head End-->
<!-- Blog-Inner Start -->
<section class="courses_det blog_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-8 blog_img ">	
				<div class="row">
					<div class="col-md-12">
						<img class="full" src="{{$blog->image}}" alt="" />
					<div class="blog_txt about_sch">
						@if ( Config::get('app.locale') == 'en')
			                  <h4>{{$blog->title}}</h4>
			                @elseif ( Config::get('app.locale') == 'tr' )
			                  <h4>{{$blog->title_tr}}</h4>
			                @elseif ( Config::get('app.locale') == 'ar' )
			                  <h4>{{$blog->title_ar}}</h4>
			                @elseif ( Config::get('app.locale') == 'ru' )
			                  <h4>{{$blog->title_ru}}</h4>
			                @elseif ( Config::get('app.locale') == 'de' )
			                  <h4>{{$blog->title_de}}</h4>
			                @elseif ( Config::get('app.locale') == 'it' )
			                  <h4>{{$blog->title_it}}</h4>
			                @elseif ( Config::get('app.locale') == 'fr' )
			                  <h4>{{$blog->title_fr}}</h4>
			                @elseif ( Config::get('app.locale') == 'es' )
			                  <h4>{{$blog->title_es}}</h4>
			                @elseif ( Config::get('app.locale') == 'se' )
			                  <h4>{{$blog->title_se}}</h4>
			                @elseif ( Config::get('app.locale') == 'jp' )
			                  <h4>{{$blog->title_jp}}</h4>
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                  <h4>{{$blog->title_fa}}</h4>
			                @elseif ( Config::get('app.locale') == 'pr' )
			                  <h4>{{$blog->title_pr}}</h4>
                             @endif  
					<div class="row sch_web">
						<div class="col-md-4 col-sm-4 col-xs-4 jan  ">
							@php
							$date = date('d-M-Y', strtotime($blog->created_at)); 
							@endphp
							<h5>{{$date}}</h5>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 mt_0 add mx-w andreo ">
							<h5 class="rgt-bor clr_blck"></h5>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 fd ">
							@if ( Config::get('app.locale') == 'en')
			                  <h5>{{$blog->category_name}}</h5>
			                @elseif ( Config::get('app.locale') == 'tr' )
			                  <h5>{{$blog->category_name_tr}}</h5>
			                @elseif ( Config::get('app.locale') == 'ar' )
			                  <h5>{{$blog->category_name_ar}}</h5>
			                @elseif ( Config::get('app.locale') == 'ru' )
			                  <h5>{{$blog->category_name_ru}}</h5>
			                @elseif ( Config::get('app.locale') == 'de' )
			                  <h5>{{$blog->category_name_de}}</h5>
			                @elseif ( Config::get('app.locale') == 'it' )
			                  <h5>{{$blog->category_name_it}}</h5>
			                @elseif ( Config::get('app.locale') == 'fr' )
			                  <h5>{{$blog->category_name_fr}}</h5>
			                @elseif ( Config::get('app.locale') == 'es' )
			                  <h5>{{$blog->category_name_es}}</h5>
			                @elseif ( Config::get('app.locale') == 'se' )
			                  <h5>{{$blog->category_name_se}}</h5>
			                @elseif ( Config::get('app.locale') == 'jp' )
			                  <h5>{{$blog->category_name_jp}}</h5>
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                  <h5>{{$blog->category_name_fa}}</h5>
			                @elseif ( Config::get('app.locale') == 'pr' )
			                  <h5>{{$blog->category_name_pr}}</h5>
                             @endif 
						</div>
						<div class="clearfix"></div>
					</div>
					@if ( Config::get('app.locale') == 'en')
					  @php
                       $description = str_limit($blog->description, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                @elseif ( Config::get('app.locale') == 'tr' )
	                  @php
                       $description = str_limit($blog->description_tr, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                @elseif ( Config::get('app.locale') == 'ar' )
	                  @php
                       $description = str_limit($blog->description_ar, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                @elseif ( Config::get('app.locale') == 'ru' )
	                  @php
                       $description = str_limit($blog->description_ru, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                @elseif ( Config::get('app.locale') == 'de' )
	                  @php
                       $description = str_limit($blog->description_de, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                @elseif ( Config::get('app.locale') == 'it' )
	                  @php
                       $description = str_limit($blog->description_it, 250);
					  @endphp
	                  <p class="mt_10">{!! $description !!}</p>
	                  @elseif ( Config::get('app.locale') == 'fr' )
	                  @php
                       $description = str_limit($blog->description_fr, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>
					  @elseif ( Config::get('app.locale') == 'es' )
		              @php
                       $description = str_limit($blog->description_es, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>
		              @elseif ( Config::get('app.locale') == 'se' )
		              @php
                       $description = str_limit($blog->description_se, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>
		              @elseif ( Config::get('app.locale') == 'jp' )
		              @php
                       $description = str_limit($blog->description_jp, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>
		              @elseif ( Config::get('app.locale') == 'fa' ) 
		              @php
                       $description = str_limit($blog->description_fa, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>       
		              @elseif ( Config::get('app.locale') == 'pr' )
		              @php
                       $description = str_limit($blog->description_pr, 250);
					  @endphp
					  <p class="mt_10">{!! $description !!}</p>
                    @endif 
					</div>
					<div class="border-line"></div>
					<div class=" row pre_nxt ">
						<div class="col-md-6">
							@if($previous)
							<a href="{{route('blogDetail',['id'=>$previous->id])}}"><i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left pre" aria-hidden="true"></i>@lang('blog.pre_post')</a>
							@endif
						</div>
						<div class="col-md-6 text-right">
							@if($next)
							<a href="{{route('blogDetail',['id'=>$next->id])}}">@lang('blog.next_post')<i class="fa fa-angle-right nxt" aria-hidden="true"></i><i class="fa fa-angle-right " aria-hidden="true"></i></a>
							@endif
						</div>
					</div>
					<div class="school_comment mt_10">
					<div class="row">
						<div class="col-md-12 city_head com_1 ">
							<h2>{{$countreview}} @lang('blog.comment')</h2>
						</div>
						@foreach($reviews as $review)
						<div class="review_views  w-100">
							<div class="d-inline float-left">
								
									<div class="viwers_img viewer_profile_image">
								@php $userimage = App\User::where('id',$review->user_id)->first();
								    @endphp
									<img src="{{$userimage->image}}" alt=""/>
								</div>
								
							</div>
							<div class="col-md-10">
								<div class="viwers_txt">
									@php
									$date = date('d-M-Y', strtotime($review->created_at)); 
									@endphp
									<span>{{$date}}</span>
									<h3>{{$review->user_name}}</h3>
									<p>{{$review->comment}}</p>
									<div class="row viewer_rating">
										<!-- <div class="col-md-2 col-sm-2 col-xs-2 w33 w20 pd05_sm w18 rgt-bor ">
											<i class="fa fa-thumbs-up thumb" aria-hidden="true"></i>
											<span class=" f17">1<span>
										</div> -->
										<!-- <div class="col-md-4 col-sm-4 col-xs-4 text-center pd05_sm1 pd05_sm w33 w28 rgt-bor">
											<i class="fa fa-reply reply" aria-hidden="true"></i>
											<span class=" f17">Reply<span>
										</div> -->
										<div class="col-md-4 col-sm-4 col-xs-4 star_rat box-1 no-border pd05_sm text-center w33">
											<ul class="star_check">
												@for($i=1;$i<=($review->rate);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="leave_comm comm_leave">
								<h2 class="pad_left">@lang('blog.leavecomment')</h2>
							</div>
						</div>
					</div>	
					 @if(Auth::check())
					 	<form  method="post" action="{{ route('storeblogReview') }}">
                   {{ csrf_field()}}
                   <input type="hidden" name="blog_id" class="form-control" value="{{$blog->id}}">
							<input type="hidden" name="user_id" class="form-control" @if(Auth::check()) value="{{Auth::user()->id}}" @endif>
					<div class="row review_form">
								<div class="col-md-6">
									<input type="text" name="name" placeholder="Name" value="{{Auth::user()->name}}" required readonly="">
								</div>
								<div class="col-md-6 mail">
									<input type="text" name="email" placeholder="Your Email" value="{{Auth::user()->email}}" required="" readonly="">
								</div>
							</div>
							<div class="row review_form">
								<div class="col-md-12">
									<textarea class="form-control rounded-0" name="comment" id="exampleFormControlTextarea2" rows="3" placeholder="@lang('blog.comment')" required></textarea>
								</div>
							</div>
							<div class="post_button subscribe_inner ">
								<input type="submit" value="@lang('blog.postcomment')" style="cursor:pointer;">
							</div>
						</form>
							@else
						<div class="row client">
							
						<span>@lang('courses.logged_msz')</span>
							
						</div>
						@endif

				</div>
				</div>
			</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 blog_cat">
				<form  method="post" action="{{route('allsearchblogs')}}">
			 {{ csrf_field() }}
				<div class="row">
					<div class="col-md-12 search_filter">
						<input class="r" name="search_blog" type="text" id="autosearchblog" placeholder="@lang('blog.search')"/>
						<button type="submit" class="r"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</form>
				<div class="row">
					<div class="col-md-12 city_head blog_categ">
						<h2>@lang('blog.categories')</h2>
						<ul class="mt_5">
							 @foreach($categories as $category)
							@if ( Config::get('app.locale') == 'en')
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name}}</a></li>
			                @elseif ( Config::get('app.locale') == 'tr' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_tr}}</a></li>
			                @elseif ( Config::get('app.locale') == 'ar' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_ar}}</a></li>
			                @elseif ( Config::get('app.locale') == 'ru' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_ru}}</a></li>
			                @elseif ( Config::get('app.locale') == 'de' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_de}}</a></li>
			                @elseif ( Config::get('app.locale') == 'it' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_it}}</a></li>
			                @elseif ( Config::get('app.locale') == 'fr' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_fr}}</a></li>
			                @elseif ( Config::get('app.locale') == 'es' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_es}}</a></li>
			                @elseif ( Config::get('app.locale') == 'se' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_se}}</a></li>
			                @elseif ( Config::get('app.locale') == 'jp' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_jp}}</a></li>
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_fa}}</a></li>        
			                @elseif ( Config::get('app.locale') == 'pr' )
			                <li><a href="{{route('categoryBlog',['id'=>$category->id])}}">- {{$category->name_pr}}</a></li>        
			                @endif  
							@endforeach
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 city_head blog_categ">
						<h2>@lang('blog.recent')</h2>
					</div>
				</div>
				@foreach($otherblogs as $otherblog)
				<div class="border-line"></div>
				<div class="row rec_post">
					<div class="col-md-4">
						<img class="full" src="{{$otherblog->image}}" alt="" />
					</div>
					@php
							$otherblogdate = date('d-M-Y', strtotime($otherblog->created_at)); 
							@endphp
					<div class="col-md-8">
						@if ( Config::get('app.locale') == 'en')
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'tr' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_tr}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'ar' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_ar}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'ru' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_ru}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'de' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_de}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'it' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_it}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'fr' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_fr}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'es' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_es}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'se' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_se}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'jp' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_jp}}</a></h3>
		                @elseif ( Config::get('app.locale') == 'fa' ) 
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_fa}}</a></h3>         
		                @elseif ( Config::get('app.locale') == 'pr' )
		                <h3><a href="{{route('blogDetail',['id'=>$otherblog->id])}}">{{$otherblog->title_pr}}</a></h3>      
                        @endif  
						<span class="add pr_5">{{$otherblogdate}}</span class="pl_5"><span>{{$otherblog->comments}} @lang('blog.comment')</span>
					</div>
				</div>
				@endforeach
				
				
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog-Inner End -->
@endsection
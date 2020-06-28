@extends('front.index1')
@section('title', 'User Profile')
@section('content')
<!-- Profile section starts  -->
<section>
@php
$user_id = Auth::user()->id; 
$userinfo = App\Userinfo::where('userId', $user_id)->first();
$getrole = App\UserRole::where('user_id', $user_id)->first();
if($getrole){
$role_id = $getrole->role_id;
$role = App\Role::where('id', $role_id)->first();
$role = $role->name;
}
@endphp  

<div class="container">
<div class="row profile">

<!-- tabbed pannel starts -->
<div class="col-md-12">
<div class="row">
<div class="col-sm-12">
<div class="row">
<div class="col-md-3 ">
<div class="profile-sidebar">
<!-- SIDEBAR USERPIC -->
    <form class="form" action="{{route('changeProfileImage')}}" method="post" enctype="multipart/form-data" id="changeProfile">
                  @csrf
            <div class="profile-userpic col-lg-12 text-center float-left">
             @if(Auth::user()->image == null)
              <img title="profile image"  class="img-circle img-responsive" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
              @else
              <img title="profile image"  id="image_upload_preview" class="img-circle img-responsive" src="{{Auth::user()->image}}">
              @endif
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{Auth::user()->name}}
                        </div>
                        <div class="profile-usertitle-job">
                            {{$role}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <!-- <input type="hidden" id="getImage" value="{{asset('profile/'.auth::user()->image)}}"> -->       
                <button class="btn btn-success btn-sm" type="button" onclick="change();">@lang('profile.change_file')</button>
                  <!-- <button class="btn btn-success btn-sm" type="button" onclick="remove();">Remove File</button> -->
                  <button class="btn btn-success btn-sm" type="submit">@lang('profile.save')</button>
                  <input type="file" id="inputFile" name="image" accept="image/*" class="text-center center-block file-upload" style="display: none;">
                  <div class="form-group float-left">
                       <div class="col-md-12">
                            <br>
                            <!-- <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>  -->          
                        </div>
                  </div>
                    </div>
                </form>
<!-- END SIDEBAR BUTTONS -->

<!-- required for floating -->
<!-- Nav tabs -->
<div class="profile-usermenu">
<ul class="nav nav-tabs tabs-left profile-usermenu">
    <li><a href="#profile_overview" data-toggle="tab">@lang('profile.overview')</a></li>
    <li><a href="#invite_friends" data-toggle="tab">@lang('profile.invite_friends')</a></li>
    <li><a href="#profile_credits" data-toggle="tab">@lang('profile.my_credits')</a></li>
    <li><a href="#saved_courses" data-toggle="tab">@lang('profile.saved_course')</a></li>
    <li><a href="#saved_school" data-toggle="tab">@lang('profile.saved_school')</a></li>
    <li><a href="#saved_accommodation" data-toggle="tab">@lang('profile.saved_acc')</a></li>
    <li><a href="#paid_course" data-toggle="tab"> @lang('profile.paid_course')</a></li>
     <li><a href="#paid_accommodation" data-toggle="tab"> @lang('profile.paid_acc')</a></li>
    <li>
    <a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> @lang('profile.logout')</a> </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
    </form>
</ul>
</div>
</div>
</div>
<div class="col-md-9">
<!-- Tab panes -->
<div class="tab-content">
<!-- Profile overview content starts -->
<div class="tab-pane" id="profile_overview">
<div class="profile-content table-responsive p-sm-0">
    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <th style="border-top:0" colspan="2">{{Auth::user()->name}} @lang('profile.profile') <a href="{{route('editUser')}}" class="float-right">@lang('profile.ctep')</a></th>
                            </tr>
                            <tr>
                                <td>@lang('profile.full_name') :</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>@lang('profile.dob') :</td>
                                @if($userinfo)
                                <td>{{$userinfo->dob}}</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr>
                            <td>@lang('profile.ph_no')</td>
                                @if($userinfo)
                                <td>{{$userinfo->phone}}</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                                <tr>
                                    <td>@lang('profile.email')</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('profile.full_address')</td>
                                    @if($userinfo)
                                <td>{!!$userinfo->address!!}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>
                                <tr>
                                    <td>@lang('profile.p_language')</td>
                                    @if($userinfo)
                                <td>{{$userinfo->language}}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>

                                <tr>
                                <td>@lang('profile.preffered_currency')</td>
                                @if($userinfo)
                                <td>{{$userinfo->currency}}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>

                                 <tr>
                                <td>@lang('profile.country')</td>
                                @if($userinfo)
                                <td>{{$userinfo->country}}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>
                                
                        </tbody>
                    </table>     
</div>
</div>
<!-- profile overview content finish -->
<!-- profile invite friends content starts -->
<div class="tab-pane active" id="invite_friends">
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.invite_friends')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="col-md-12">
        <div class="row">
            <div class="inner_refer mt-0 bg-light">     
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10 col-xs-10 offset-xs-1 offset-md-1 offset-sm-1 text-center">     
                                                <div class="cus_title refer_txt">
                                                    <h5>@lang('profile.share_link')</h5>    
                                                </div>
                                                <p class="custom_p main-head">@lang('profile.introduce')<br/> @lang('profile.guest_rtt')</p>
                                            </div>  
                                        </div>
                                        <div class="share_links">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                <div class="row">
                                                    <ul>
                            <li><a href="https://web.whatsapp.com/send?text=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/whatsapp.png')}}"/><span>@lang('profile.wttsapp')</span></a></li>
                            <li><a href="https://plus.google.com/share?url=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}"
   title="Share by Email"><img class="full" src="{{asset('front/images/rsz_google-logo-1-resized.jpg')}}"/><span>@lang('profile.email')</span></a></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}" target="_blank"><img class="full" src="{{asset('front/images/facebook.png')}}"/><span>@lang('profile.facebook')</span></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/twiter.png')}}"/><span>@lang('profile.twitter')</span></a></li>
                            <li><a href="#"><img class="full" src="{{asset('front/images/linkdin.png')}}"/><span>@lang('profile.linkdin')</span></a></li>
                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-10 offset-md-1 offset-sm-1 text-center or">
                                            <span>@lang('profile.or')</span>
                                            <p>@lang('profile.share_link')</p>
                                            <div class="row">
                                                <div class="col-md-7 col-sm-7 col-xs-9 input-field input-link review_form">
                                                    <input class="form-control w-100" value="http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-3 pl-0 text-center invite_send">
                                                    <a class="send" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}">@lang('profile.send_invite')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </div>
    </div>
    <!-- paid courses content finsih -->
</div>
</div>
<!-- profile invite friends content finish -->
<!-- profile credits content starts -->
<div class="tab-pane" id="profile_credits">
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.my_credits')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="col-md-12">
        <div class="row">
           <div class="mycredits col-md-12">
                                
                                <div class="table-responsive table-striped">
                                    <table class="table">
                                        <tr>
                                            <th>@lang('profile.refer_to')</th>
                                            <th>@lang('profile.email')</th>
                                            <th class="text-center">@lang('profile.credit_points')</th>
                                        </tr>
                                        @foreach($get_refers as $refer)
                                        <tr>
                                                <td>{{$refer->name}}</td>
                                                <td>{{$refer->email}}</td>
                                                <td class="text-center">10</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                                <td>&nbsp;</td>
                                                <td class="font-weight-bold text-success">@lang('profile.total_points')</td>
                                                <td class="font-weight-bold text-success text-center">{{$total_credit}}</td>
                                        </tr>
                                    </table>
                                </div>
                                

                            </div>
        </div>
    </div>
    <!-- paid courses content finsih -->
</div>
</div>
<!-- profile credits content finsih -->
<!-- profile saved school content starts -->
<div class="tab-pane" id="saved_school">
 @if($count_fav_school !=0)
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.my_saved_sachool')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="w-100">
        <div class="row">
                @foreach($schools as $school)
                
                <div class="col-lg-4 col-md-6 inner_language float-left ">
                    <a href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}">
                    <div class="box_outer">

                        @if($school->image != null) 
                        <img class="full_img"src="{{asset('thumbnail_images/'.$school->image)}}">
                        @else
                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}" style="height:136px;">
                        @endif
                        <div class="deal_box">
                        <h3> @if ( Config::get('app.locale') == 'en')
                      {{$school->name}}
                    @elseif ( Config::get('app.locale') == 'tr' )
                      {{$school->name_tr}}
                    @elseif ( Config::get('app.locale') == 'ar' )
                     {{$school->name_ar}}
                    @elseif ( Config::get('app.locale') == 'ru' )
                      {{$school->name_ru}}
                    @elseif ( Config::get('app.locale') == 'de' )
                      {{$school->name_de}}
                    @elseif ( Config::get('app.locale') == 'it' )
                      {{$school->name_it}}
                    @elseif ( Config::get('app.locale') == 'fr' )
                     {{$school->name_fr}}
                    @elseif ( Config::get('app.locale') == 'es' )
                     {{$school->name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                      {{$school->name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$school->name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                      {{$school->name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                      {{$school->name_pr}}  
                   @endif</h3>
                        <div class="review_box">
                        <div class="loc_left">
                        <h5><i class="fa fa-map-marker"></i>{{$school->city}}, {{$school->country}}</h5>
                         </div>
                        <div class="review_rgt">
                         <div class="school_comment AirSmallStar">
                           <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                            <?php 
                           $alltotal  = $school->review_rate_fschool+$school->review_rate_fschool1+$school->review_rate_fschool2+$school->review_rate_fschool3+$school->review_rate_fschool4+$school->review_rate_fschool5;
                             $getaverage = $alltotal/6;
                             if(is_float($getaverage)){
                              $starNumber = number_format((float)$getaverage, 1, '.', ''); 
                            }else{
                               $starNumber = $getaverage;
                            }
                         ?>
                            <div class="stars"> 
                              <?php
                             $explode    = explode('.',$starNumber);
                                for($x=1;$x<=$starNumber;$x++) { ?>
                                     <span class="star on"></span>
                                <?php } if (strpos($starNumber,'.')) { ?>
                                     <span class="star half exp<?php echo $explode[1]; ?>"></span>
                                <?php $x++; }
                                while ($x<=5) { ?>
                                     <span class="star"></span>
                               <?php  $x++; }  ?>
                                 <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>
                              </div>
                           </div>
                         </div>
                        </div>  
                    </div>
                    
                        <div class="clearfix"></div>
                        <div class="box-bottom box_language">
                            <div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">
                                <p>{{$school->agelimit}} @lang('profile.years') +</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">
                                <p>{{$school->courseCount}} @lang('profile.course')</p>
                            </div>
                        </div>
                        </div>
                        </div>
                    
                        </a>
                </div>
              
                @endforeach
                <div class="clearfix"></div>
                <div class="view text-center">
                   <a href="{{route('mainAllSchool')}}">@lang('profile.view_all_school')</a>
                </div>
            </div>
    </div>
    <!-- paid courses content finsih -->
</div>
@else
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.no_saved_school')</h6>
</div>
@endif
</div>
<!-- profile saved school content finsih -->


<div class="tab-pane" id="saved_accommodation">
 @if($count_fav_accomodation !=0)
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.my_saved_accommodation')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="w-100">
        <div class="row">
                @foreach($accommodations as $accommodation)
                <div class="col-lg-4 col-md-6 inner_language float-left ">
                    <div class="box_outer">

                        @if($accommodation->image != null) 
                        <a href="{{route('accommodationDetail',['id'=>$accommodation->id,'slug'=>$accommodation->slug])}}"><img class="full_img"src="{{asset('thumbnail_images/'.$accommodation->image)}}"></a>
                        @else
                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}" style="height:136px;">
                        @endif
                        <div class="box-1 m-b-40">
                        <h3><a href="{{route('accommodationDetail',['id'=>$accommodation->id,'slug'=>$accommodation->slug])}}"> @if ( Config::get('app.locale') == 'en')
                          {{$accommodation->name}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                          {{$accommodation->name_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                         {{$accommodation->name_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                          {{$accommodation->name_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                          {{$accommodation->name_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                          {{$accommodation->name_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                         {{$accommodation->name_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                         {{$accommodation->name_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                          {{$accommodation->name_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                          {{$accommodation->name_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' ) 
                          {{$accommodation->name_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                          {{$accommodation->name_pr}} @endif</a></h3>
                        <div class="marker">
                        <h5><i class="fa fa-map-marker"></i>{{$accommodation->city}}, {{$accommodation->country}}</h5>
                        <!-- <h6>Review</h6>
                        
                            @if($accommodation->count_total_reviews > 0)
                                  @php 
                                  $rating = $accommodation->review_rate; 
                                  @endphp  
                                <ul>
                                     @while($rating>0)
                                        @if($rating >0)
                                            <li><span class="fa fa-star"></span></li>
                                        @endif
                                        @php $rating--; @endphp
                                    @endwhile                   
                                </ul>
                                @else
                                <ul>
                            <li><span class="fa fa-star" style="color:#dddddd;"></span></li>
                            <li><span class="fa fa-star" style="color:#dddddd;"></span></li>
                            <li><span class="fa fa-star" style="color:#dddddd;"></span></li>
                            <li><span class="fa fa-star" style="color:#dddddd;"></span></li>
                            <li><span class="fa fa-star" style="color:#dddddd;"></span></li>
                        </ul>
                     @endif -->
                     <div class="review_rgt">
                            <div class="school_comment AirSmallStar">
                           <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                            <?php 
                           $alltotal  = $accommodation->review_rate+$accommodation->review_rate1+$accommodation->review_rate2+$accommodation->review_rate3;
                           $getaverage = $alltotal/4;
                             if(is_float($getaverage)){
                              $starNumber = number_format((float)$getaverage, 1, '.', ''); 
                            }else{
                               $starNumber = $getaverage;
                            }
                        ?>
                              <div class="stars"> 
                                <?php
                             $explode    = explode('.',$starNumber);
                                for($x=1;$x<=$starNumber;$x++) { ?>
                                     <span class="star on"></span>
                                <?php } if (strpos($starNumber,'.')) { ?>
                                     <span class="star half exp<?php echo $explode[1]; ?>"></span>
                                <?php $x++; }
                                while ($x<=5) { ?>
                                     <span class="star"></span>
                             <?php  $x++; }  ?>
                                 <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>
                              </div>
                           </div>
                        </div>
                         
                     </div>
                        <div class="clearfix"></div>
                        <div class="box-bottom box_language">
                            <div class="col-md-12 col-sm-12 col-xs-12 float-left grey-border age">
                                <p>@lang('profile.acc_type') :{{$accommodation->roomtype}}</p>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
                <div class="view text-center">
                   <a href="{{route('allaccommodation')}}">@lang('profile.view_all_accs')</a>
                </div>
            </div>
    </div>
    <!-- paid courses content finsih -->
</div>
@else
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.no_saved_acc')</h6>
</div>
@endif  
</div> 


<!-- profile saved Course content starts -->
<div class="tab-pane" id="saved_courses">
@if(count($savedcourses) !=0)
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.my_saved_courses')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
   <div class="mt-20">
                        <div class="row">
                            @foreach($savedcourses as $course)
                             <div class="col-md-6 course_col">
                                <a href="{{route('singleCourse',['id'=>$course->coursePid,'slug'=>$course->slug])}}">
                            
                                <div class="box_outer">
                                <img class="full_img" src="{{asset('thumbnail_images/'.$course->image)}}" alt=""/>  

                                 <div class="deal_box">
                        @if ( Config::get('app.locale') == 'en')
                          <h3>{{$course->name}}</h3>
                        @elseif ( Config::get('app.locale') == 'tr' )
                          <h3>{{$course->name_tr}}</h3>
                        @elseif ( Config::get('app.locale') == 'ar' )
                          <h3>{{$course->name_ar}}</h3>
                        @elseif ( Config::get('app.locale') == 'ru' )
                          <h3>{{$course->name_ru}}</h3>
                        @elseif ( Config::get('app.locale') == 'de' )
                          <h3>{{$course->name_de}}</h3>
                        @elseif ( Config::get('app.locale') == 'it' )
                          <h3>{{$course->name_it}}</h3>
                        @elseif ( Config::get('app.locale') == 'fr' )
                          <h3>{{$course->name_fr}}</h3>
                        @elseif ( Config::get('app.locale') == 'es' )
                        <h3>{{$course->name_es}}</h3>
                        @elseif ( Config::get('app.locale') == 'se' )
                        <h3>{{$course->name_se}}</h3>
                        @elseif ( Config::get('app.locale') == 'jp' )
                        <h3>{{$course->name_jp}}</h3>
                        @elseif ( Config::get('app.locale') == 'fa' )
                        <h3>{{$course->name_fa}}</h3>
                        @elseif ( Config::get('app.locale') == 'pr' )
                        <h3>{{$course->name_pr}}</h3>         
                        @endif 

                        <div class="review_box">
                        <div class="loc_left">
                        <h5><i class="fa fa-map-marker"></i>{{$course->city}},{{$course->country}}</h5>
                         </div>
                        <div class="review_rgt">
                            <div class="school_comment AirSmallStar">
                           <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                            <?php 
                           $alltotal  = $course->review_rate_fcourse+$course->review_rate_fcourse1+$course->review_rate_fcourse2+$course->review_rate_fcourse3;
                           $getaverage = $alltotal/4;
                             if(is_float($getaverage)){
                              $starNumber = number_format((float)$getaverage, 1, '.', ''); 
                            }else{
                               $starNumber = $getaverage;
                            }
                        ?>
                              <div class="stars"> 
                                <?php
                             $explode    = explode('.',$starNumber);
                                for($x=1;$x<=$starNumber;$x++) { ?>
                                     <span class="star on"></span>
                                <?php } if (strpos($starNumber,'.')) { ?>
                                     <span class="star half exp<?php echo $explode[1]; ?>"></span>
                                <?php $x++; }
                                while ($x<=5) { ?>
                                     <span class="star"></span>
                             <?php  $x++; }  ?>
                                 <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>
                              </div>
                           </div>
                        </div>
                         
                     </div> 
                    </div>
                    
                        <div class="clearfix"></div>
                        <div class="box-bottom box_language">
                            <div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">
                                <p>{{$course->age}} @lang('front.years') +</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">
                                <p>£{{$course->ppw1}}</p>
                            </div>
                        </div>
                        </div>                          
                                
                            </div>
                            </a>
                            </div>                     
                            @endforeach

                            <div class="clearfix"></div>
                            <div class="cus_btn btn_round btn_full">
                                <a href="{{route('allCourse')}}">@lang('profile.view_all_course')</a>
                            </div>
                        </div>
                    </div>

    <!-- paid courses content finsih -->
</div>
@else
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.no_saved_course')</h6>
</div>
@endif   
</div>
<!-- profile saved Course content finsih -->



<!-- paid course content starts -->
<div class="tab-pane" id="paid_course">
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">My Paid course</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="w-100">
        <div class="row">
          
<div class="table-responsive table-striped">
                                    <table class="table">
                                        <tr>
                                            <th>@lang('profile.sno')</th>
                                            <th>@lang('profile.school_name')</th>
                                            <th>@lang('profile.course_name')</th>
                                            <th>@lang('profile.course_start_date')</th>
                                            <th>@lang('profile.total_price')</th>
                                            <th>@lang('profile.r_url')</th>
                                            <th>@lang('profile.date')</th>
                                            <th>@lang('profile.generate_pdf')</th>
                                        </tr>
                                       @foreach($bookedCourses as $bookedcourse)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('schooldetail',['id'=>$bookedcourse->school_id,'slug'=>$bookedcourse->slug])}}">@if ( Config::get('app.locale') == 'en')
                          {{$bookedcourse->schoolname}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                          {{$bookedcourse->schoolname_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                         {{$bookedcourse->schoolname_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                          {{$bookedcourse->schoolname_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                          {{$bookedcourse->schoolname_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                          {{$bookedcourse->schoolname_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                         {{$bookedcourse->schoolname_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                         {{$bookedcourse->schoolname_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                          {{$bookedcourse->schoolname_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                          {{$bookedcourse->schoolname_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' ) 
                          {{$bookedcourse->schoolname_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                          {{$bookedcourse->schoolname_pr}} @endif</a></td>
                                            <td>@if ( Config::get('app.locale') == 'en')
                          {{$bookedcourse->course_name}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                          {{$bookedcourse->course_name_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                         {{$bookedcourse->course_name_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                          {{$bookedcourse->course_name_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                          {{$bookedcourse->course_name_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                          {{$bookedcourse->course_name_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                         {{$bookedcourse->course_name_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                         {{$bookedcourse->course_name_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                          {{$bookedcourse->course_name_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                          {{$bookedcourse->course_name_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' ) 
                          {{$bookedcourse->course_name_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                          {{$bookedcourse->course_name_pr}} @endif</td>
                                            <td>{{$bookedcourse->course_date}}</td>
                                            <td>£{{$bookedcourse->total_course_price}}</td>
                                            <td><a href="{{$bookedcourse->receipt_url}}" target="_blank">@lang('profile.check')</a></td>
                                            <td>{{$bookedcourse->created_at}}</td>
                                            <td><button class="btn btn success"><a href="{{route('generatepdf',['id'=>$bookedcourse->id])}}">@lang('profile.print')</a></button></td>


                                        </tr>
                                     @endforeach
                                       
                                    </table>
                                </div>

           
        </div>
    </div>
    <!-- paid course content finsih -->


</div>
</div>




<!-- paid Accommodation content starts -->
<div class="tab-pane" id="paid_accommodation">
<div class="profile-content">
    <h6 class="mb-3 w-100 float-left">@lang('profile.my_paid_acc')</h6>
    <div class="clearfix"></div>
    <!-- paid courses content starts -->
    <div class="w-100">
        <div class="row">
          
<div class="table-responsive table-striped">
                                    <table class="table">
                                        <tr>
                                            <th>@lang('profile.sno')</th>
                                            <th>@lang('profile.acc_name')</th>
                                            <th>@lang('profile.type')</th>
                                            <th>@lang('profile.r_url')</th>
                                            <th>@lang('profile.total_price')</th>
                                            <th>@lang('profile.date')</th>
                                            <th>@lang('profile.generate_pdf')</th>
                                        </tr>
                                       @foreach($accobookings as $accobooking)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('accommodationDetail',['slug'=>$accobooking->slug,'id'=>$accobooking->accommodationId])}}">
                    @if ( Config::get('app.locale') == 'en')
                      {{$accobooking->name}}
                    @elseif ( Config::get('app.locale') == 'tr' )
                      {{$accobooking->name_tr}}
                    @elseif ( Config::get('app.locale') == 'ar' )
                      {{$accobooking->name_ar}}
                    @elseif ( Config::get('app.locale') == 'ru' )
                      {{$accobooking->name_ru}}
                    @elseif ( Config::get('app.locale') == 'de' )
                      {{$accobooking->name_de}}
                    @elseif ( Config::get('app.locale') == 'it' )
                       {{$accobooking->name_it}}
                    @elseif ( Config::get('app.locale') == 'fr' )
                      {{$accobooking->name_fr}}
                    @elseif ( Config::get('app.locale') == 'es' )
                     {{$accobooking->name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                      {{$accobooking->name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {{$accobooking->name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                       {{$accobooking->name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                       {{$accobooking->name_pr}}  
                   @endif</a></td>
                                            <td> @if ( Config::get('app.locale') == 'en')
                      {{$accobooking->typename}}
                    @elseif ( Config::get('app.locale') == 'tr' )
                      {{$accobooking->typename_tr}}
                    @elseif ( Config::get('app.locale') == 'ar' )
                      {{$accobooking->typename_ar}}
                    @elseif ( Config::get('app.locale') == 'ru' )
                      {{$accobooking->typename_ru}}
                    @elseif ( Config::get('app.locale') == 'de' )
                      {{$accobooking->typename_de}}
                    @elseif ( Config::get('app.locale') == 'it' )
                       {{$accobooking->typename_it}}
                    @elseif ( Config::get('app.locale') == 'fr' )
                      {{$accobooking->typename_fr}}
                    @elseif ( Config::get('app.locale') == 'es' )
                     {{$accobooking->typename_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                      {{$accobooking->typename_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {{$accobooking->typename_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                      {{$accobooking->typename_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                      {{$accobooking->typename_pr}}  
                   @endif</td>
                                            <td><a href="{{$accobooking->receipt_url}}" target="_blank">@lang('profile.check')</a></td>
                                            <td>£{{$accobooking->price}}</td>
                                            <td>{{$accobooking->created_at}}</td>
                                             <td><button class="btn btn success"><a href="{{route('generateaccpdf',['id'=>$accobooking->id])}}">@lang('profile.print')</a></button></td>

                                        </tr>
                                     @endforeach
                                       
                                    </table>
                                </div>

           
        </div>
    </div>
    <!-- paid Accommodation content finsih -->


<!-- profile saved school content finsih -->


</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>



</div>
</div> 
</section>
<script>

function change()
{
inputFile.click();
}
function remove()
{
$('#image_upload_preview').attr('src',$('#getImage').val());
$("#inputFile").val('').clone(true);
}
function readURL(input)
{
if (input.files && input.files[0])
{
var reader = new FileReader();
reader.onload = function (e)
{
$('#image_upload_preview').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$("#inputFile").change(function ()
{
readURL(this);
});
</script>
<script>
/*$(document).ready(function () {
var $content = $(".profile-submenu").hide();
$(".profile-parent").on("click", function (e) {
$(this).toggleClass("expanded");
if ($(this).hasClass('expanded')) {
$(this).find('.fa').addClass('fa-minus').removeClass('fa-plus');
} else {
$(this).find('.fa').addClass('fa-plus').removeClass('fa-minus');
}
$content.slideToggle();
});
});*/
</script>

@endsection
<!-- profile section finish -->

<?php

namespace App\Http\Controllers\Schooladmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Common;
use App\Course;
use App\Courseprice;
use App\Coursetitle;
use App\Courseshift;
use App\School;
use App\Schoolcourse;
use App\Coursediscount;
use Auth;
use Imageresize;

class CourseController extends Controller
{
   
   public function storeCourse(Request $request){

       
   	    $course = new Course;
        $course->schoolId       = $request->school_id;
        $course->course_id      = $request->course_id;
        $course->agelimit       = $request->agelimit;
        $course->description    = $request->description;
        $course->max_group_size    = $request->max_group_size;
        // $getSlug = new Common();
        // $Slug=$getSlug->slug($request->name,$modelName);
         // $course->slug = "slug";

        if($request->file('image')){

                  $photo = $request->file('image');
                  $name = rand(1,100);
                    $name = $name.time();
                    $imagename = $name.'.'.$photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl  = $base_url.'/thumbnail_images/'.$imagename;
                    $destinationPath = public_path('/thumbnail_images'); 
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(1140, 760);
                    $thumb_img->save($destinationPath.'/'.$imagename,80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    $course->image = $imagename;
           }
        

        $courseexist = Course::where('schoolId', $request->school_id)->where('course_id',$request->course_id)->first();

        if($courseexist == null){
              $course->save();
              return back()->with('success',"Course successfully created ");
          }
          else{
            return back()->with('error',"Course already exist");   
          }
        

   }
   public function allCourse(Request $request){

   	    $schoolname  = School::find($request->id);
        $courses     = Course::where('schoolId',$request->id)->join('coursetitles', 'coursetitles.id' , '=' , 'courses.course_id')->select('courses.*','coursetitles.name as courseName')->get();

        return view('schooladmin.course.allcourse',compact('courses','schoolname'));

    }


      public function destroyCourse(Request $request)
    {
        $course = Course::find($request->id);
        $courseprice = Courseprice::where('courseId',$request->id)->delete();
        
           if($course->delete())
            {
            	$courseprice = Courseprice::where('courseId',$request->id)->delete();
                return 1;
            }
            else
            {
                return 0;
            }
        
    }


    public function editCourse(Request $request)
    {
       $course  = Course::find($request->id);
       $courseTitle = Coursetitle::where('id', $course->course_id)->first();
       $school  = School::where('id', $course->schoolId)->first();
       $course->school_name =  $school->name;
       $course->courseName = $courseTitle->name;

        return view('schooladmin.course.editcourse',compact('course'));




    }
    public function updateCourse(Request $request){

   	    $course                 = Course::find($request->id);
        $course->schoolId       = $request->school_id;
        $course->course_id      = $request->course_id;
        $course->agelimit       = $request->agelimit;
        $course->description    = $request->description;
        $course->max_group_size = $request->max_group_size;

          if($request->file('image')){

                  $photo = $request->file('image');
                  $name = rand(1,100);
                    $name = $name.time();
                    $imagename = $name.'.'.$photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl  = $base_url.'/thumbnail_images/'.$imagename;
                    $destinationPath = public_path('/thumbnail_images'); 
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(1140, 760);
                    $thumb_img->save($destinationPath.'/'.$imagename,80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    $course->image = $imagename;
           }
        

        $course->save();

        return back()->with('success',"Course successfully updated");
        

   }
    public function getCourse(Request $request)
    {
         $sid = $request->schoolId;
         $courses = Courseprice::where('schoolId',$sid)->get();
         $html = '<option value="">Select Course</option>';
         foreach($courses as $course){
          $coursetitle = Coursetitle::where('id', $course->courseId)->first();
            $html.="<option value=".$course->id.">".$coursetitle->name."</option>";
            
         }
    return $html;
    }
   public function addCoursePrice(){
        $userId = Auth::user()->id;	
        $schools = School::where('userId',$userId)->get();
        return view('schooladmin/course/addcourseprice',compact('schools'));
    }
   public function storeCoursePrice(Request $request){

        $input = Input::all();
       

            foreach($input['hour_per_week'] as $index => $value)
            {
            $courseprice = new Courseprice;
            $courseprice->schoolId = $request->school_id;
            $courseprice->courseId = $request->course_Id;
            $courseprice->hours_per_week = $input['hour_per_week'][$index];
            $courseprice->ppw1 = $input['ppw1'][$index];
            $courseprice->ppw2 = $input['ppw2'][$index];
            $courseprice->ppw3 = $input['ppw3'][$index];
            $courseprice->ppw4 = $input['ppw4'][$index];
            $courseprice->ppw5 = $input['ppw5'][$index];
            $courseprice->ppw6 = $input['ppw6'][$index];
            $courseprice->ppw7 = $input['ppw7'][$index];
            $courseprice->ppw8 = $input['ppw8'][$index];
            $courseprice->ppw9 = $input['ppw9'][$index];
            $courseprice->ppw10 = $input['ppw10'][$index];
            $courseprice->ppw11 = $input['ppw11'][$index];
            $courseprice->ppw12 = $input['ppw12'][$index];
            $courseprice->ppw13 = $input['ppw13'][$index];
			$courseprice->lesson_per_week = $input['lesson_per_week'][$index];
            $coursepriceexist   = Courseprice::where('schoolId', $request->school_id)->where('courseId',$request->course_Id)->where('hours_per_week',$input['hour_per_week'][$index])->first();

            if( $coursepriceexist == null){

               if(!empty($input['hour_per_week'][$index]) && !empty($input['ppw1'][$index]))
               {
              
              $courseprice->save();

                 
              }
            }
            else{

              return back()->with('error',"Prices for this course already exist");   

            }
        }
         return back()->with('success',"Course Price successfully added ");
    }

    public function allCoursePrices(Request $request){

	     $coursename    = Course::find($request->id);
       $courseTitle =  Coursetitle::where('id',$coursename->course_id)->first();
       $coursesprice  = Courseprice::where('courseId',$coursename->id)->where('schoolId',$coursename->schoolId)->get();
        return view('schooladmin.course.allcourseprice',compact('coursesprice','coursename', 'courseTitle'));

    }
    
    public function editCoursePrices(Request $request)
    {

       $courseprice  = Courseprice::find($request->id);
       /* GET School name */
       $schoolid     = $courseprice->schoolId;
       $schoolname   = School::where('id',$schoolid)->first();
       $courseprice->school_id   =  $schoolname->id;
       $courseprice->school_name =  $schoolname->name;
       /* GET Course name */
       $courseid     = $courseprice->courseId;
       $course = Course::where('id',$courseid)->first();
       $coursesname  = Coursetitle::where('id',$course->course_id)->first();
       $courseprice->course_id   =  $course->id;
       $courseprice->course_name =  $coursesname->name;

       return view('schooladmin.course.editcourseprice',compact('courseprice', 'schools'));

    }
    public function updateCoursePrices(Request $request){
   	    $courseprice = Courseprice::find($request->id);
        $courseprice->schoolId       = $request->school_id;
        $courseprice->courseId       = $request->course_Id;
        $courseprice->hours_per_week = $request->hour_per_week;
        $courseprice->ppw1           = $request->ppw1;
        $courseprice->ppw2           = $request->ppw2;
        $courseprice->ppw3           = $request->ppw3;
        $courseprice->ppw4           = $request->ppw4;
        $courseprice->ppw5           = $request->ppw5;
        $courseprice->ppw6           = $request->ppw6;
        $courseprice->ppw7           = $request->ppw7;
        $courseprice->ppw8           = $request->ppw8;
        $courseprice->ppw9           = $request->ppw9;
        $courseprice->ppw10          = $request->ppw10;
        $courseprice->ppw11          = $request->ppw11;
        $courseprice->ppw12          = $request->ppw12;
        $courseprice->ppw13          = $request->ppw13;
		$courseprice->lesson_per_week = $request->lesson_per_week;
        $courseprice->save();
        return back()->with('success',"Courseprice successfully updated");
        
   }

    public function destroyCoursePrices(Request $request)
    {
        $courseprice = Courseprice::find($request->id);
           if($courseprice->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        
    }  


    public function storeSchoolCourse(Request $request){
       $validator = Validator::make($request->all(),
        [
            'name'=>'required',
            'shift'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails())
        {
           return Response::json(['errors' => $validator->errors()]);
        }
       
      else
        {if($request['shift'])
            {

             foreach($request['shift'] as $shift){

                      if(!empty($shift)){

                          $courseshift = Courseshift::where('id', $shift )->first();

                        $coursename = $request->name.'['.$courseshift->name.']';
                          
                        $nameexist = Coursetitle::where('name', $coursename)->get();
                        if(count($nameexist)>0){

                         return Response::json(['error' => "Name is already exist"]);

                        }
                        else
                        {
                           $modelName = 'Course';
                           $getSlug = new Common();
                           $Slug = $getSlug->slug($coursename,$modelName);
                              
                          Coursetitle::insert([
                              'name' => $coursename,
                              'shift_id'=> $shift,
                              'description'=>$request->description,
                              'status'=> 0,
                              'slug' => $Slug
                           ]);    
                      } 
                  }     
              }

             
              //return $data;
             return 1;
                // return back()->with('success',"Course Title successfully created");
            } 
            else{
            return 0;
          }
        }

            // return back()->with('success',"Shift is Required ");
    }

    public function destroySchoolCourse(Request $request){
      $destroyschoolcourse = Schoolcourse::find($request->id);
           if($destroyschoolcourse->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
    }

    public function addCourseDiscount(Request $request){
      $userId = Auth::user()->id; 
        $schools = School::where('userId',$userId)->get();
        return view('schooladmin/course/addcoursediscount',compact('schools'));

    }

    public function storeCourseDiscount(Request $request){
      
        $discount = new Coursediscount;
        $discount->school_id       = $request->school_id;
        $discount->course_id      = $request->course_id;
        $discount->discount       = $request->discount;
        $discountexist = Coursediscount::where('school_id', $request->school_id)->where('course_id', $request->course_id)->get();

        if(count($discountexist)>0){

          return back()->with('error',"Discount is already exist");
        }
        else{

          $discount->save();
          return back()->with('success',"Discount added successfully");
        }
    }

    public function allCourseDiscount(Request $request){

       $coursename    = Course::find($request->id);
       $courseTitle =  Coursetitle::where('id',$coursename->course_id)->first();
       $coursediscount  = Coursediscount::where('course_id',$courseTitle->id)->where('school_id',$coursename->schoolId)->first();

        return view('schooladmin.course.allcoursediscount',compact('coursediscount','coursename', 'courseTitle'));

    }

     public function editCourseDiscount(Request $request)
    {

       $coursediscount  = Coursediscount::find($request->id);
       /* GET School name */
       $schoolid     = $coursediscount->school_id;
       $schoolname   = School::where('id',$schoolid)->first();
       $coursediscount->school_id   =  $schoolname->id;
       $coursediscount->school_name =  $schoolname->name;
       /* GET Course name */
       $courseid     = $coursediscount->course_id;
       $coursesname  = Coursetitle::where('id',$courseid)->first();
       $coursediscount->course_id   =  $coursesname->id;
       $coursediscount->course_name =  $coursesname->name;

       return view('schooladmin.course.editcoursediscount',compact('coursediscount', 'schools'));
     }

      public function updateCourseDiscount(Request $request){
      
        $discount = Coursediscount::find($request->id);
        $discount->school_id       = $request->school_id;
        $discount->course_id      = $request->course_id;
        $discount->discount       = $request->discount;
        
        if($discount->update()){
          $discount->update();
          return back()->with('success',"Discount updated successfully");
        }
    }

    public function destroyCourseDiscount(Request $request)
    {
        $coursediscount = Coursediscount::find($request->id);
           if($coursediscount->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        
    }  


}

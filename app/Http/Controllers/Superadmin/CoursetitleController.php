<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coursetitle;
use App\Courseprice;
use App\Course;
use App\Common;
use App\Schoolcourse;
use App\School;

class CoursetitleController extends Controller
{

    public function storeCourseTitle(Request $request)
    {
       if($request['shift'])
            {

             foreach($request['shift'] as $shift){

                            if(!empty($shift)){
                                
                            	$coursename = $request->name.'['.$shift.']';
                                
                            	$nameexist = Coursetitle::where('name', $coursename)->get();
                            	if(count($nameexist)>0){

                            		return back()->with('success',"Name is already exist");

                            	}
                            	else
                            	{

                                     $modelName = 'Course';
                                     $getSlug = new Common();
                                     $Slug = $getSlug->slug($coursename,$modelName);
                                    
	                              Coursetitle::insert([
                                    'name' => $coursename,
                                    'slug' => $Slug
                                 ]);    
                            } 
                        }     
                    }

                return back()->with('success',"Course Title successfully created");
            } 

            return back()->with('success',"Shift is Required ");

    }

    public function allCourseTitle(Request $request){

        $coursetitles = Coursetitle::all();
        return view('superadmin.course.allcourse',compact('coursetitles'));

    }

    public function editCourseTitle($id)
    {
        $coursetitle  = Coursetitle::find($id);
        $course = explode('[', $coursetitle->name);
        $coursename = $course[0];

        $coursen = explode(']', $course[1]);

        $shift = $coursen[0];
        return view('superadmin.course.editcourse',compact('coursetitle', 'shift', 'coursename'));

    }

    public function destroyCourseTitle(Request $request)
    {
        $coursetitle = Coursetitle::find($request->id);
        if( $coursetitle){
        $course = Course::where('course_id',$request->id)->delete();
        $courseprice = Courseprice::where('courseId',$request->id)->delete();
        $requestedcourse = Schoolcourse::where('courseName', $coursetitle->name)->where('status', 1)->delete();
        }
       
        if($coursetitle->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

     public function updateCourseTitle(Request $request)
    {
     

         $coursetitle  = Coursetitle::find($request->id);

        $coursename = $request->name.'['.$request->shift.']';
        $coursetitle->name = $coursename;

        $nameexist = Coursetitle::where('name', $coursename)->get();

        if( count($nameexist)>0 ){
            return back()->with('success', 'course title already Exist');
         
        }
            else
            {
                if($coursetitle->update()){
             
               return back()->with('success', 'course title updated successfully'); 
            }
                
            }

    }    

    public function newSchoolCourse(){

        $schoolcourses = Schoolcourse::join('schools','schools.id' , '=' , 'schoolcourses.schoolId')->select('schoolcourses.*','schools.name as schoolName')->get();
       
     return view('superadmin.course.schoolcourse',compact('schoolcourses'));

    }

     public function updateCourseStatus(Request $request){

             $id = $request->id;
            $coursestatus = Schoolcourse::find($id);
            $status = $request->value;
          
            if($status == 0){

             $coursestatus->status = 1;
              $modelName = 'Course';
             $getSlug = new Common();
             $Slug = $getSlug->slug($coursestatus->courseName,$modelName);

             // $coursename = Coursetitle::where('name', $coursestatus->courseName)->get();
             // if(count($coursename)<0)
             // {

            $coursetitle = new Coursetitle;
            $coursetitle->name = $coursestatus->courseName;
             $coursetitle->slug = $Slug;
             $coursetitle->save();    
             // }                  

            }

            // if($status == 1){
            //       $coursestatus->status = 0;

            //       $deletecourse = Coursetitle::where('name',$coursestatus->courseName)->delete();
            //  }
            

         if($coursestatus->update()){
            
            return "success";
        }

    }

      public function deleteschoolCourse(Request $request)
    {
    
        $schoolcourse = Schoolcourse::find($request->id);

        if($schoolcourse->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }



}

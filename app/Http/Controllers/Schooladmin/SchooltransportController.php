<?php

namespace App\Http\Controllers\Schooladmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\School;
use App\Schooltransport;
use Auth;

class SchooltransportController extends Controller
{
	public function addSchoolTransport()
	{
		$userId = Auth::user()->id;
		$schools = School::where('userId', $userId)->get();
		return view('schooladmin/schooltransport/addschooltransport', compact('schools','countries'));
	}

	public function storeSchoolTransport(Request $request)
	{
		$schooltransport = new Schooltransport;
		$schooltransport->school_id = $request->school_id;
		$schooltransport->airport_name = $request->airport_name;
		$schooltransport->pick_up = $request->pp;
		$schooltransport->pick_up_and_drop = $request->pdp;
		$schooltransportexist = Schooltransport::where('school_id', $schooltransport->school_id)->first();
		if($schooltransport->save())
		{
			return back()->with('success',"Schooltransport successfully created ");
		}       
		/*  if( $schooltransportexist == null)
		{
		if($schooltransport->save())
		{
			return back()->with('success',"Schooltransport successfully created ");
		} 	
		}
		else{

			 return back()->with('error',"Schooltransport Already  exist with this School Name and Country Name ");
		}*/
	}

	public function allSchoolTransport()
	{
		$userId = Auth::user()->id;
		$schooltransports = Schooltransport::join('schools', 'schools.id' ,'=', 'schooltransports.school_id')->where('schools.userId', $userId)->select('schooltransports.*','schools.name as schoolName')->get();  
		return view('schooladmin.schooltransport.allschooltransport',compact('schooltransports'));
	}

	public function editSchoolTransport(Request $request)
	{
	   $schooltransport = Schooltransport::where('id', $request->id)->first();
	   $school = School::where('id', $schooltransport->school_id)->first();
	   $schooltransport->school_name = $school->name;
	   $schools = School::all();
	   return view('schooladmin.schooltransport.editschooltransport',compact('schooltransport','schools'));
	}

	public function updateSchoolTransport(Request $request)
	{
		$schooltransport = Schooltransport::find($request->id);
		$schooltransport->school_id = $request->school_id;
		$schooltransport->airport_name = $request->airport_name;
		$schooltransport->pick_up = $request->pp;
		$schooltransport->pick_up_and_drop = $request->pdp;		
		$schooltransportexist = Schooltransport::where('school_id', $schooltransport->school_id)->first();
		if( $schooltransportexist != null)
		{
			if($schooltransport->update())
			{
				return back()->with('success',"Schooltransport successfully updated ");
			} 	
		}
		else
		{
			return back()->with('error',"Schooltransport Already  exist with this School Name and Country Name ");
		}
	}

	public function destroySchoolTransport(Request $request)
	{
		$schooltransport = Schooltransport::find($request->id);
		if($schooltransport->delete())
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}

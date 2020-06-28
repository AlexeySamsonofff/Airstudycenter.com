<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Coursetitle;

class PageController extends Controller
{
	public function dashboard()
    {
    	$schools = School::all();
    	$schoolcount = count($schools);

    	$courses = Coursetitle::all();
    	$coursecount = count($courses);

    	return view('superadmin.dashboard', compact('schoolcount','coursecount'));
    }
}

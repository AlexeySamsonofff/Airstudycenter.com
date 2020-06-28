<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::orderBy('id', 'desc')->get();

       return view('superadmin/role/allrole',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'unique:roles', 
        ],
        [
            'name.unique' =>    'Role Name is already exist',
           
        ]);
      $role = new Role;
      $role->name = $request->name;
      $role->save();
       return back()->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id); 
       return view('superadmin/role/editrole', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::find($id);
      
         $this->validate($request,[
            'name'=>'unique:roles,name,' .$id,
        
        ],
        [
            'name.required' => 'Role Name is Required',
        ]);   
      
      $role->name = $request->name;
      $role->update();
       return back()->with('success', 'Role Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        //$userRole = UserRole::where('role_id', $id)->delete();
       
         if($role->Delete())
        {
            return "success";
        }
        else
        {
            return "error";
        }

    }
}

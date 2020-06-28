<?php
namespace App;
// use App\Role;
use App\Http\Controllers\Controller;

class Common {

	public function slug($title,$model)
	{
		$modelClass = 'App\\'.$model;

	       $slug = str_slug($title,'-');
	       $allSlugs = $modelClass::get();
	     if($allSlugs->contains('slug',$slug))
	     {
	         $i=1;
	         while($allSlugs->contains('slug',$slug))
	         {
	         	$slug = $slug.'-'.$i++;
	         }

	         return $slug;
	     }
	     else
	     {
	     	return $slug;
	     }
	}

	
 
}
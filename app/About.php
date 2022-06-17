<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	protected $fillable=[
		"about_title", 
		"about_text", 			    
		"en_about_title",     
		"en_about_text", 		    
	];
}

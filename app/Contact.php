<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable=["contact_title", 
     					
     					"contact_text", 
     					
     					"en_contact_title", 
     					
     					"en_contact_text", 
     					];
}

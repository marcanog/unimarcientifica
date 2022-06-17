<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    
    protected $fillable=[
        /*spanish*/
        "name_author",
        "lastname_author",
        "email_author",
        "grades_author",
        "resume_author",
        "route_image_author",
        /*english*/
        "en_grades_author",
        "en_resume_author",
        /*italiano*/
        "it_grades_author",
        "it_resume_author",
	];
    
    public function articles(){
        return $this->hasMany('App\Article', 'author_id');
    }
} 
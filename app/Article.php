<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
		"title", 
		"author",
		"slug",
		"section", 
		"ruta_image",
		"text", 
		"ruta_file", 
		"en_title", 
		"en_text", 
		"edition_id",
		"author_id",
	];
	public $timestamps = false;
	public function comment(){
		return $this->hasMany('App\Comment','articles_id')->where('approved',1)->orderBy('id','desc');
	}
	public function edition(){
        return $this->belongsTo('App\Edition', 'edition_id');
	}
	public function author(){
        return $this->belongsTo('App\Author', 'author_id');
    }
}

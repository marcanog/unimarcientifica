<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article(){
		return $this->belongsTo('App\Article','articles_id');
	}
    public function user(){
		return $this->belongsTo('App\User','users_id');
	}
}

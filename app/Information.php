<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable=[
        /*spanish*/
        "information_title",
        "information_text",
        "ruta_info_file",
        /*english*/
        "en_information_title",
        "en_information_text",
        "ruta_info_en_file"
        
	];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationModel extends Model
{
    protected $table= "company_information";
    static function dataFooter(){
    	$footer = InformationModel::find(1);
    	return $footer;
    }
}

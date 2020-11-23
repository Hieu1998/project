<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
	protected $table = "banners";
	static function banner(){
		$danhSachBanner = BannerModel::where('daXoa',0)->where('is_set',1)->get();
		return $danhSachBanner;
	}
}

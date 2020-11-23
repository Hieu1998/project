<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class MenuModel extends Model
{
	protected $table = 'menu';
	static function GetMenuByChaId($chaId,$level,$id){ 
		$r = MenuModel::select('id','chaId','url','ten','daXoa')->where('daXoa',0)->where('chaId','=',$chaId)->where('id','!=',$id)->get();
        //đệ quy
		$array = [];
		foreach($r as $key=>$value){
			$value->level = $level;
			$temCon = MenuModel::GetMenuByChaId($value->id,$level+1,$id);
            //nếu mà không tìm thấy temCon nua thì gán nó là value->lala = 1 nếu nó tìm thấy thì nó là cành
			if(count($temCon) == 0){
				$value->lala = 1;
			}
			$array[] = $value;
			$array = array_merge($array,$temCon);
		}
		return $array;
	}
	static function GetMenuByChaIdToTree($chaId){ 
		$danhSach = MenuModel::where('chaId','=',$chaId)->where('daXoa',0)->get();
		$array = [];
		foreach($danhSach as $key=>$value){
			$temp['value'] = $value;
			$temp['con'] = MenuModel::GetMenuByChaIdToTree($value->id);
			$temp['quyen'] = 1;
			$array[] = $temp;
		}
		return $array;
	}
	static function GetSystemMenu($tree,$isFirst){

		if($isFirst){
			//menu cha
			$menu = '<ul class="navbar-nav mr-auto menu-cha">';
		} 
		else{
			//menu con
			$menu = '<ul><div class="dropdown-menu menu-con">';
		}
		foreach($tree as $value){
			//day la cha
			if($value['value']->chaId == 1){
				//neu menu cha co menu con thì hiện mũi tên xuống ngược lại thì cho active
				if(count($value['con']) > 0){
					$menu.='<li class="nav-item dropdown">'.'<a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="'.$value["value"]->url.'">'. trans('label.'.$value['value']->ten.'').'</a>';
					$menu.= MenuModel::GetSystemMenu($value['con'],false);
					$menu.='</li>';
				}else{
					$menu.='<li class="nav-item dropdown">'.'<a class="nav-link" href="'.$value["value"]->url.'">'. trans('label.'.$value['value']->ten.'').'</a>';
					$menu.='</li>';
				}	
			}else{
				//day la con
				$menu.='<a class="dropdown-item" href="'.$value["value"]->url.'">'.$value['value']->ten.'</a>';
				$menu.= MenuModel::GetSystemMenu($value['con'],false);
			}
		}
		$menu.='</div></ul>';
		return $menu;
	}
	static function ShowCart(){
		$cart = Cart::content();
        return $cart;
	}
}

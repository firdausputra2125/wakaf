<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class custompost extends Sximo  {
	
	protected $table = 'tb_pages';
	protected $primaryKey = 'pageID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT tb_pages.pageID, tb_pages.userid, tb_pages.id_program, tb_pages.id_mushaf, tb_pages.total_mushaf, tb_pages.deadline FROM `tb_pages` ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE tb_pages.pageID IS NOT NULL AND tb_pages.pagetype = 'post' ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}

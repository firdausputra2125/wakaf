<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class campaign extends Sximo  {
	
	protected $table = 'tb_pages';
	protected $primaryKey = 'pageID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT tb_pages.* , CONCAT(SUM(tb_comments.total_mushaf), '/', tb_pages.total_mushaf) AS mushaf, CONCAT(COUNT(commentID), ' orang') AS donatur FROM tb_pages 
 LEFT JOIN tb_comments ON tb_comments.pageID = tb_pages.pageID ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE tb_pages.pageID IS NOT NULL AND pagetype = 'post' ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}

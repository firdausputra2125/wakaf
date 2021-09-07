<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class customcomments extends Sximo  {
	
	protected $table = 'tb_comments';
	protected $primaryKey = 'commentID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " SELECT tb_comments.commentID, tb_comments.image_proof, tb_comments.servant_Allah, tb_comments.domicile_donate FROM `tb_comments` ";
	}	

	public static function queryWhere(  ){
		
		return " WHERE tb_comments.commentID IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}

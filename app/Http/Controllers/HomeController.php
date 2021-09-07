<?php  namespace App\Http\Controllers;

use App\Models\Post;
use App\Library\Markdown;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class HomeController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['pageLang'] = 'en';
		if(\Session::get('lang') != '')
		{
			$this->data['pageLang'] = \Session::get('lang');
		}	
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index( Request $request) 
	{
        \App::setLocale(\Session::get('lang'));

		if(config('sximo.cnf_front') =='false' && $request->segment(1) =='' ) :
			return redirect('dashboard');
		endif; 	

		//print_r( config('sximo'));

		$page = $request->segment(1);
		\DB::table('tb_pages')->where('alias',$page)->update(array('views'=> \DB::raw('views+1')));

		
		if($page !='') {
			$sql = \DB::table('tb_pages')->where('alias','=',$page)->where('status','=','enable')->get();
			$row = $sql[0];
			if(file_exists(base_path().'/resources/views/layouts/'.config('sximo.cnf_theme').'/template/'.$row->filename.'.blade.php') && $row->filename !='')
			{
				$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.'.$row->filename;
			} else {
				$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.page';
			}	

			if($row->access !='')
			{
				$access = json_decode($row->access,true)	;	
			} else {
				$access = array();
			}	

			// If guest not allowed 
			if($row->allow_guest !=1)
			{	
				$group_id = \Session::get('gid');				
				$isValid =  (isset($access[$group_id]) && $access[$group_id] == 1 ? 1 : 0 );	
				if($isValid ==0)
				{
					return redirect('')
						->with(['message' => __('core.note_restric') ,'status'=>'error']);				
				}
			}				



			$this->data['pages'] = $page_template;				
			$this->data['title'] = $row->title ;
			$this->data['subtitle'] = $row->sinopsis ;
			$this->data['pageID'] = $row->pageID ;
			$this->data['content'] = \PostHelpers::formatContent($row->note);
			$this->data['note'] = $row->note;
			if($row->template =='frontend'){
				$page = 'layouts.'.config('sximo.cnf_theme').'.index';
				return view( $page, $this->data);
			}
			else {
				
				return view( $page_template, $this->data);
				
			}
			
						
		}
		else {
			$sql = \DB::table('tb_pages')->where('default','1')->get();
			if(count($sql)>=1)
			{
				$row = $sql[0];
				$this->data['title'] = $row->title ;
				$this->data['subtitle'] = $row->sinopsis ;
				if(file_exists(base_path().'/resources/views/layouts/'.config('sximo.cnf_theme').'/template/'.$row->filename.'.blade.php') && $row->filename !='')
				{
					$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.'.$row->filename;
				} else {
					$page_template = 'layouts.'.config('sximo.cnf_theme').'.template.page';
				}				
				$this->data['pages'] = $page_template;
				$this->data['pageID'] = $row->pageID ;
				$this->data['content'] = \PostHelpers::formatContent($row->note);
				$this->data['note'] = $row->note;
				$page = 'layouts.'.config('sximo.cnf_theme').'.index';


				return view( $page, $this->data);	

			} else {
				return 'Please Set Default Page';
			}	
		}
	}
	
	public function  getLang( Request $request , $lang='en')
	{
		$request->session()->put('lang', $lang);
		return  Redirect::back();
	}

	public function  getSkin($skin='sximo')
	{
		\Session::put('themes', $skin);
		return  Redirect::back();
	}		


	public function submit( Request $request )
	{
		$formID = $request->input('form_builder_id');

		$rows = \DB::table('tb_forms')->where('formID',$formID)->get();
		if(count($rows))
		{
			$row = $rows[0];
			$forms = json_decode($row->configuration,true);
			$content = array();
			$validation = array();
			foreach($forms as $key=>$val)
			{
				$content[$key] = (isset($_POST[$key]) ? $_POST[$key] : ''); 
				if($val['validation'] !='')
				{
					$validation[$key] = $val['validation'];
				}
			}
			
			$validator = Validator::make($request->all(), $validation);	
			if (!$validator->passes()) 
					return redirect()->back()->with(['status'=>'error','message'=>'Please fill required input !'])
							->withErrors($validator)->withInput();

			
			if($row->method =='email')
			{
				// Send To Email
				$data = array(
					'email'		=> $row->email ,
					'content'	=> $content ,
					'subject'	=> "[ " .config('sximo.cnf_appname')." ] New Submited Form ",
					'title'		=> $row->name 			
				);
			
				if( config('sximo.cnf_mail') =='swift' )
				{ 				
					\Mail::send('sximo.form.email', $data, function ( $message ) use ( $data ) {
			    		$message->to($data['email'])->subject($data['subject']);
			    	});		

				}  else {

					$message 	 = view('sximo.form.email', $data);
					$headers  	 = 'MIME-Version: 1.0' . "\r\n";
					$headers 	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers 	.= 'From: '. config('sximo.cnf_appname'). ' <'.config('sximo.cnf_email').'>' . "\r\n";
						mail($data['email'], $data['subject'], $message, $headers);	
				}
				
				return redirect()->back()->with(['status'=>'success','message'=> $row->success ]);

			} else {
				// Insert into database 
				\DB::table($row->tablename)->insert($content);
				return redirect()->back()->with(['status'=>'success','message'=>  $row->success  ]);
			
			}
		} else {

			return redirect()->back()->with(['status'=>'error','message'=>'Cant process the form !']);
		}


	}

	public function getLoad()
	{	
		$result = \DB::table('tb_notification')->where('userid',\Session::get('uid'))->where('is_read','0')->orderBy('created','desc')->limit(5)->get();

		$data = array();
		$i = 0;
		foreach($result as $row)
		{
			if(++$i <=10 )
			{
				if($row->postedBy =='' or $row->postedBy == 0)
				{
					$image = '<img src="'.asset('uploads/images/system.png').'" border="0" width="30" class="img-circle" />';
				} 
				else {
					$image = \SiteHelpers::avatar('30', $row->postedBy);
				}
				$data[] = array(
						'url'	=> $row->url,
						'title'	=> $row->title ,
						'icon'	=> $row->icon,
						'image'	=> $image,
						'text'	=> substr($row->note,0,100),
						'date'	=> date("d/m/y",strtotime($row->created))
					);
			}	
		}
	
		$data = array(
			'total'	=> count($result) ,
			'note'	=> $data
			);	
		 return response()->json($data);	
	}

	public function posts( Request $request ,  $category = '') 
	{

		$posts = \DB::table('tb_pages')
				->select('tb_pages.*','tb_users.username','tb_users.avatar',\DB::raw('COUNT(commentID) AS comments'),\DB::raw('SUM(tb_comments.total_mushaf) AS get_mushaf'))
				->leftJoin('tb_users','tb_users.id','tb_pages.userid')
				->leftJoin('tb_comments','tb_comments.pageID','tb_pages.pageID')		
				->leftJoin('tb_categories','tb_categories.cid','tb_pages.cid')					
				->where('pagetype','post')
				->orderBy('created','desc');
					/* 
					if(!is_null($request->input('label'))){
						$keyword = trim($request->input('label'));
						$posts = $posts->where('labels', 'LIKE' , "%{$keyword}%%" ); 	
					}
					*/
	
				if( $category !=''  ) {
					$mode = 'category';
					$this->data['categoryDetail'] = Post::categoryDetail( $category );
					$posts = $posts->where('tb_categories.alias',$category )->groupBy('tb_pages.pageID')->paginate(6);					
				}
				else {
					$mode = 'all';

					$posts = $posts->groupBy('tb_pages.pageID')->paginate(6);
				}					

		$this->data['title']		= 'Post Articles';
		$this->data['posts']		= $posts;
		$this->data['pages']		= 'secure.posts.posts';
		$this->data['popular']		= Post::lists('popular');
		$this->data['headline']		= Post::lists('headline');
		$this->data['categories']		= Post::categories();
		$this->data['mode']			= $mode;


		$this->data['pages'] = 'layouts.'.config('sximo.cnf_theme').'.blog.index';	
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $this->data);	
	}

	public function read( Request $request , $read = '')  {

		$row = Post::read( $read );
	//	print_r($posts);exit;
		$comments = Post::comments( $row->pageID );
		$data = [
			'title'	=> $row->title ,
			'posts'	=> $row ,
			'comments'	=>  $comments ,
			'pages' => 'layouts.'.config('sximo.cnf_theme').'.blog.view',
			'popular'	=> Post::lists('popular') , 
			'categories'	=> Post::categories() ,
			'domicile'	=> Post::domicile()
		];
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $data);	

	}



	public function comment( Request $request)
	{
		$rules = array(
			'name_donate'		=> 'required',
			'name_waqf'			=> 'required',
			'number_phone_donate'	=> 'required',
			'domicile_donate' => 'required'
		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$nominaldonate = $request->input('nominal_donate'); //150000
			$pricemushaf = $request->input('price_mushaf'); //130000
			if($nominaldonate != 0) {
			
				if($nominaldonate < $pricemushaf) {
					$fundbase = $nominaldonate; //sisa jika nominal transfer kurang dari harga 1 mushaf
					$totalmushaf = 0;
					$fundmushaf = 0;
				}else{
					$totalmushaf = floor($nominaldonate / $pricemushaf); //150k / 130k = 1
					$fundmushaf = $totalmushaf * $pricemushaf;// 1 * 130k = 130k
					$fundbase = $nominaldonate - ($totalmushaf * $pricemushaf); //20k
				}
			}else{
				return redirect('posts/read/'.$request->input('alias'))
				->with(['message'=>'Nominal transfer tidak boleh kosong','status'=>'error']);
			}
			if(!is_null($request->input('servant_Allah')))
				{
					$servantAllah = $request->input('servant_Allah');
				} else {
					$servantAllah = 0;
				}
			$data = array(
					'userID'		=> $request->input('userid'),
					'id_program'	=> $request->input('id_program'),
					'id_mushaf'		=> $request->input('id_mushaf'),
					'name_donate'	=> $request->input('name_donate'),
					'number_phone_donate'	=> '62' . $request->input('number_phone_donate'),
					'domicile_donate'	=> '62' . $request->input('domicile_donate'),
					'name_waqf'		=> $request->input('name_waqf'),
					'nominal_donate'=> $request->input('nominal_donate'),
					'servant_Allah'	=> $servantAllah,
					'total_mushaf'	=> $totalmushaf,
					'fund_mushaf'	=> $fundmushaf,
					'fund_base'		=> $fundbase,
					'posted'		=> date('Y-m-d H:i:s') ,
					'comments'		=> $request->input('comments'),
					'pageID'		=> $request->input('pageID'),
					
				);
			if(!is_null($request->file('image_proof')))
					{
						$updates = array();
						$file = $request->file('image_proof'); 
						$destinationPath = './uploads/proof/';
						$filename = $file->getClientOriginalName();
						$extension = $file->getClientOriginalExtension(); //if you need extension of the file
						$newfilename = date('Ymd-').substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6).'.'.$extension;
						$uploadSuccess = $request->file('image_proof')->move($destinationPath, $newfilename);				 
						if( $uploadSuccess ) {
						    $data['image_proof'] = $newfilename;
						} 						
					}
			else	
					{
						return redirect('posts/read/'.$request->input('alias'))
							->with(['message'=>'Mohon sertakan bukti transfer','status'=>'error']);
					}
			
			\DB::table('tb_comments')->insert($data);
			return redirect('posts/read/'.$request->input('alias'))
        		->with(['message'=>'Kami dari Wakaf Online mengucapkan terima kasih kepada ' . $request->input('name_donate') . ', Alhamdulilah data sudah kami terima. jazakumullah khairan.','status'=>'success']);
		} else {
			return redirect('posts/read/'.$request->input('alias'))
				->with(['message'=>'Ada form yang belum terisi. Mohon cek lagi','status'=>'error']);	
		}
	}

	public function remove( Request $request, $pageID , $alias , $commentID )
	{
		if($commentID !='')
		{
			\DB::table('tb_comments')->where('commentID',$commentID)->delete();
			return redirect('posts/read/'.$alias)
				->with(['message'=>'Comment has been deleted !','status'=>'success']);
       
		} else {
			return redirect('posts/post/'.$alias)
				->with(['message'=>'Failed to remove comment !','status'=>'error']);
		}
	}

	public function set_theme( $id ){
		session(['set_theme'=> $id ]);
		return response()->json(['status'=>'success']);
	}	


}

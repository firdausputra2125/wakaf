

		 {!! Form::open(array('url'=>'campaign', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Campaign</legend>
				{!! Form::hidden('pageID', $row['pageID']) !!}					
									  <div class="form-group row  " >
										<label for="Cid" class=" control-label col-md-4 "> Cid </label>
										<div class="col-md-8">
										  <input  type='text' name='cid' id='cid' value='{{ $row['cid'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Title" class=" control-label col-md-4 "> Title </label>
										<div class="col-md-8">
										  <input  type='text' name='title' id='title' value='{{ $row['title'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Alias" class=" control-label col-md-4 "> Alias </label>
										<div class="col-md-8">
										  <input  type='text' name='alias' id='alias' value='{{ $row['alias'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Sinopsis" class=" control-label col-md-4 "> Sinopsis </label>
										<div class="col-md-8">
										  <input  type='text' name='sinopsis' id='sinopsis' value='{{ $row['sinopsis'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Note" class=" control-label col-md-4 "> Note </label>
										<div class="col-md-8">
										  <input  type='text' name='note' id='note' value='{{ $row['note'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Filename" class=" control-label col-md-4 "> Filename </label>
										<div class="col-md-8">
										  <input  type='text' name='filename' id='filename' value='{{ $row['filename'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Headline" class=" control-label col-md-4 "> Headline </label>
										<div class="col-md-8">
										  <input  type='text' name='headline' id='headline' value='{{ $row['headline'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Status" class=" control-label col-md-4 "> Status </label>
										<div class="col-md-8">
										  <input  type='text' name='status' id='status' value='{{ $row['status'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Access" class=" control-label col-md-4 "> Access </label>
										<div class="col-md-8">
										  <input  type='text' name='access' id='access' value='{{ $row['access'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Allow Guest" class=" control-label col-md-4 "> Allow Guest </label>
										<div class="col-md-8">
										  <input  type='text' name='allow_guest' id='allow_guest' value='{{ $row['allow_guest'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Template" class=" control-label col-md-4 "> Template </label>
										<div class="col-md-8">
										  <input  type='text' name='template' id='template' value='{{ $row['template'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Metakey" class=" control-label col-md-4 "> Metakey </label>
										<div class="col-md-8">
										  <input  type='text' name='metakey' id='metakey' value='{{ $row['metakey'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Metadesc" class=" control-label col-md-4 "> Metadesc </label>
										<div class="col-md-8">
										  <input  type='text' name='metadesc' id='metadesc' value='{{ $row['metadesc'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Default" class=" control-label col-md-4 "> Default </label>
										<div class="col-md-8">
										  <input  type='text' name='default' id='default' value='{{ $row['default'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Pagetype" class=" control-label col-md-4 "> Pagetype </label>
										<div class="col-md-8">
										  <input  type='text' name='pagetype' id='pagetype' value='{{ $row['pagetype'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Labels" class=" control-label col-md-4 "> Labels </label>
										<div class="col-md-8">
										  <input  type='text' name='labels' id='labels' value='{{ $row['labels'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Views" class=" control-label col-md-4 "> Views </label>
										<div class="col-md-8">
										  <input  type='text' name='views' id='views' value='{{ $row['views'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Userid" class=" control-label col-md-4 "> Userid </label>
										<div class="col-md-8">
										  <input  type='text' name='userid' id='userid' value='{{ $row['userid'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Id Program" class=" control-label col-md-4 "> Id Program </label>
										<div class="col-md-8">
										  <input  type='text' name='id_program' id='id_program' value='{{ $row['id_program'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Id Mushaf" class=" control-label col-md-4 "> Id Mushaf </label>
										<div class="col-md-8">
										  <input  type='text' name='id_mushaf' id='id_mushaf' value='{{ $row['id_mushaf'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Total Mushaf" class=" control-label col-md-4 "> Total Mushaf </label>
										<div class="col-md-8">
										  <input  type='text' name='total_mushaf' id='total_mushaf' value='{{ $row['total_mushaf'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Deadline" class=" control-label col-md-4 "> Deadline </label>
										<div class="col-md-8">
										  <input  type='text' name='deadline' id='deadline' value='{{ $row['deadline'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Thumbnail" class=" control-label col-md-4 "> Thumbnail </label>
										<div class="col-md-8">
										  <input  type='text' name='thumbnail' id='thumbnail' value='{{ $row['thumbnail'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Cover" class=" control-label col-md-4 "> Cover </label>
										<div class="col-md-8">
										  <input  type='text' name='cover' id='cover' value='{{ $row['cover'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Image" class=" control-label col-md-4 "> Image </label>
										<div class="col-md-8">
										  <input  type='text' name='image' id='image' value='{{ $row['image'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Updated" class=" control-label col-md-4 "> Updated </label>
										<div class="col-md-8">
										  <input  type='text' name='updated' id='updated' value='{{ $row['updated'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Created" class=" control-label col-md-4 "> Created </label>
										<div class="col-md-8">
										  <input  type='text' name='created' id='created' value='{{ $row['created'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </fieldset></div>

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 



		 {!! Form::open(array('url'=>'customcomments', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Comments Custom</legend>
				{!! Form::hidden('commentID', $row['commentID']) !!}					
									  <div class="form-group row  " >
										<label for="Image Proof" class=" control-label col-md-4 "> Image Proof </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image_proof" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="image_proof-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["image_proof"],"/uploads/proof/") !!}
						</div>
					 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Servant Allah" class=" control-label col-md-4 "> Servant Allah </label>
										<div class="col-md-8">
										  <div class="input-group input-group-sm"> <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input  type='text' name='servant_Allah' id='servant_Allah' value='{{ $row['servant_Allah'] }}' 
						     class='form-control form-control-sm ' /></div> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Domicile Donate" class=" control-label col-md-4 "> Domicile Donate </label>
										<div class="col-md-8">
										  <select name='domicile_donate' rows='5' id='domicile_donate' class='select2 '   ></select> 
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
		
		
		$("#domicile_donate").jCombo("{!! url('customcomments/comboselect?filter=wo_region_city:id:nama') !!}",
		{  selected_value : '{{ $row["domicile_donate"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 

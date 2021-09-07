@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'customcomments?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
	<div class="toolbar-nav">
		<div class="row">
			<div class="col-md-6 " >
				 <a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-danger  btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
			</div>
			<div class="col-md-6  text-right " >
				<div class="btn-group">
					
						<button name="apply" class="tips btn btn-sm btn-info  "  title="{{ __('core.btn_back') }}" > {{ __('core.sb_apply') }} </button>
						<button name="save" class="tips btn btn-sm btn-primary "  id="saved-button" title="{{ __('core.btn_back') }}" > {{ __('core.sb_save') }} </button> 
						
					
				</div>		
			</div>
			
		</div>
	</div>	


	
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
	<div class="">
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

	</div>
	
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		
		$("#domicile_donate").jCombo("{!! url('customcomments/comboselect?filter=wo_region_city:id:nama') !!}",
		{  selected_value : '{{ $row["domicile_donate"] }}' });
		 	
		 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("customcomments/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop
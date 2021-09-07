@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'campaign?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
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
		<div id="wizard-step" class="wizard-circle number-tab-steps"> <h3>campaign</h3> <section> {!! Form::hidden('pageID', $row['pageID']) !!}					
									  <div class="form-group row  " >
										<label for="Category" class=" control-label col-md-4 "> Category </label>
										<div class="col-md-8">
										  <select name='cid' rows='5' id='cid' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Campaign Title" class=" control-label col-md-4 "> Campaign Title </label>
										<div class="col-md-8">
										  <input  type='text' name='title' id='title' value='{{ $row['title'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Url Alias" class=" control-label col-md-4 "> Url Alias </label>
										<div class="col-md-8">
										  <input  type='text' name='alias' id='alias' value='{{ $row['alias'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> {!! Form::hidden('status', $row['status']) !!}					
									  <div class="form-group row  " >
										<label for="Allow Guest" class=" control-label col-md-4 "> Allow Guest </label>
										<div class="col-md-8">
										  <input  type='text' name='allow_guest' id='allow_guest' value='{{ $row['allow_guest'] }}' 
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
										<label for="Userid" class=" control-label col-md-4 "> Userid </label>
										<div class="col-md-8">
										  <select name='userid' rows='5' id='userid' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Deadline" class=" control-label col-md-4 "> Deadline </label>
										<div class="col-md-8">
										  
				
					{!! Form::text('deadline', $row['deadline'],array('class'=>'form-control form-control-sm date')) !!} 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Image" class=" control-label col-md-4 "> Image </label>
										<div class="col-md-8">
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-camera"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="image" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
						</div>
						<div class="image-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["image"],"/uploads/campaign/") !!}
						</div>
					 
										 </div> 
										 
									  </div> {!! Form::hidden('updated', $row['updated']) !!}{!! Form::hidden('created', $row['created']) !!}</section> <h3></h3> <section> 					
									  <div class="form-group row  " >
										<label for="Sinopsis" class=" control-label col-md-4 "> Sinopsis </label>
										<div class="col-md-8">
										  <textarea name='sinopsis' rows='5' id='sinopsis' class='form-control form-control-sm '  
				           >{{ $row['sinopsis'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Metakey" class=" control-label col-md-4 "> Metakey </label>
										<div class="col-md-8">
										  <textarea name='metakey' rows='5' id='metakey' class='form-control form-control-sm '  
				           >{{ $row['metakey'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Metadesc" class=" control-label col-md-4 "> Metadesc </label>
										<div class="col-md-8">
										  <textarea name='metadesc' rows='5' id='metadesc' class='form-control form-control-sm '  
				           >{{ $row['metadesc'] }}</textarea> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Id Program" class=" control-label col-md-4 "> Id Program </label>
										<div class="col-md-8">
										  <select name='id_program' rows='5' id='id_program' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Id Mushaf" class=" control-label col-md-4 "> Id Mushaf </label>
										<div class="col-md-8">
										  <select name='id_mushaf' rows='5' id='id_mushaf' class='select2 '   ></select> 
										 </div> 
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Total Mushaf" class=" control-label col-md-4 "> Total Mushaf </label>
										<div class="col-md-8">
										  <input  type='text' name='total_mushaf' id='total_mushaf' value='{{ $row['total_mushaf'] }}' 
						     class='form-control form-control-sm ' /> 
										 </div> 
										 
									  </div> </section></div>

	</div>
	
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		
		$("#cid").jCombo("{!! url('campaign/comboselect?filter=tb_categories:cid:name') !!}",
		{  selected_value : '{{ $row["cid"] }}' });
		
		$("#userid").jCombo("{!! url('campaign/comboselect?filter=tb_users:id:first_name|last_name') !!}",
		{  selected_value : '{{ $row["userid"] }}' });
		
		$("#id_program").jCombo("{!! url('campaign/comboselect?filter=wo_program:id_program:name_program') !!}",
		{  selected_value : '{{ $row["id_program"] }}' });
		
		$("#id_mushaf").jCombo("{!! url('campaign/comboselect?filter=wo_mushaf:id_mushaf:name_mushaf') !!}",
		{  selected_value : '{{ $row["id_mushaf"] }}' });
		 	
		
			$(".submitted-button").hide()
			$("#wizard-step").steps({
		          headerTag: "h3",
		          bodyTag: "section",
		          transitionEffect: "fade",
		          titleTemplate: "<span class='step'>#index#</span> #title#",
		          autoFocus: true,
		          labels: {
		            finish: "Submit"
		        },
		        onFinished: function (event, currentIndex) {
		          $("#saved-button").click();
		        }
		     });
	       	$(".steps ul > li > a span").removeClass("number") 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("campaign/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop
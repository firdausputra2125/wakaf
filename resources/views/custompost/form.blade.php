@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">


	{!! Form::open(array('url'=>'custompost?return='.$return, 'class'=>'form-horizontal  validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
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
						<fieldset><legend> Post Custom</legend>
				{!! Form::hidden('pageID', $row['pageID']) !!}					
									  <div class="form-group row  " >
										<label for="Userid" class=" control-label col-md-4 "> Userid </label>
										<div class="col-md-8">
										  <select name='userid' rows='5' id='userid' class='select2 '   ></select> 
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
										 
									  </div> 					
									  <div class="form-group row  " >
										<label for="Deadline" class=" control-label col-md-4 "> Deadline </label>
										<div class="col-md-8">
										  
				
					{!! Form::text('deadline', $row['deadline'],array('class'=>'form-control form-control-sm date')) !!} 
										 </div> 
										 
									  </div> </fieldset></div>

	</div>
	
	<input type="hidden" name="action_task" value="save" />
	{!! Form::close() !!}
	</div>
</div>
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		
		$("#userid").jCombo("{!! url('custompost/comboselect?filter=tb_users:id:first_name|last_name') !!}",
		{  selected_value : '{{ $row["userid"] }}' });
		
		$("#id_program").jCombo("{!! url('custompost/comboselect?filter=wo_program:id_program:name_program') !!}",
		{  selected_value : '{{ $row["id_program"] }}' });
		
		$("#id_mushaf").jCombo("{!! url('custompost/comboselect?filter=wo_mushaf:id_mushaf:name_mushaf') !!}",
		{  selected_value : '{{ $row["id_mushaf"] }}' });
		 	
		 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("custompost/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop


		 {!! Form::open(array('url'=>'custompost', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


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
		
		
		$("#userid").jCombo("{!! url('custompost/comboselect?filter=tb_users:id:first_name|last_name') !!}",
		{  selected_value : '{{ $row["userid"] }}' });
		
		$("#id_program").jCombo("{!! url('custompost/comboselect?filter=wo_program:id_program:name_program') !!}",
		{  selected_value : '{{ $row["id_program"] }}' });
		
		$("#id_mushaf").jCombo("{!! url('custompost/comboselect?filter=wo_mushaf:id_mushaf:name_mushaf') !!}",
		{  selected_value : '{{ $row["id_mushaf"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 

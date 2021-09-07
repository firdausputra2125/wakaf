<div class="container" class="pt-3 pb-3">
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-container" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('PageID', (isset($fields['pageID']['language'])? $fields['pageID']['language'] : array())) }}</td>
						<td>{{ $row->pageID}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Userid', (isset($fields['userid']['language'])? $fields['userid']['language'] : array())) }}</td>
						<td>{{ $row->userid}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id Program', (isset($fields['id_program']['language'])? $fields['id_program']['language'] : array())) }}</td>
						<td>{{ $row->id_program}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id Mushaf', (isset($fields['id_mushaf']['language'])? $fields['id_mushaf']['language'] : array())) }}</td>
						<td>{{ $row->id_mushaf}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Total Mushaf', (isset($fields['total_mushaf']['language'])? $fields['total_mushaf']['language'] : array())) }}</td>
						<td>{{ $row->total_mushaf}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Deadline', (isset($fields['deadline']['language'])? $fields['deadline']['language'] : array())) }}</td>
						<td>{{ $row->deadline}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
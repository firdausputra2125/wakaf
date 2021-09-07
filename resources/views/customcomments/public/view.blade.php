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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('CommentID', (isset($fields['commentID']['language'])? $fields['commentID']['language'] : array())) }}</td>
						<td>{{ $row->commentID}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Image Proof', (isset($fields['image_proof']['language'])? $fields['image_proof']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image_proof,$fields['image_proof'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Servant Allah', (isset($fields['servant_Allah']['language'])? $fields['servant_Allah']['language'] : array())) }}</td>
						<td>{{ $row->servant_Allah}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Domicile Donate', (isset($fields['domicile_donate']['language'])? $fields['domicile_donate']['language'] : array())) }}</td>
						<td>{{ $row->domicile_donate}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Category', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) }}</td>
						<td>{{ $row->cid}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Title', (isset($fields['title']['language'])? $fields['title']['language'] : array())) }}</td>
						<td>{{ $row->title}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Alias', (isset($fields['alias']['language'])? $fields['alias']['language'] : array())) }}</td>
						<td>{{ $row->alias}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sinopsis', (isset($fields['sinopsis']['language'])? $fields['sinopsis']['language'] : array())) }}</td>
						<td>{{ $row->sinopsis}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) }}</td>
						<td>{{ $row->status}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Allow Guest', (isset($fields['allow_guest']['language'])? $fields['allow_guest']['language'] : array())) }}</td>
						<td>{{ $row->allow_guest}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Metakey', (isset($fields['metakey']['language'])? $fields['metakey']['language'] : array())) }}</td>
						<td>{{ $row->metakey}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Metadesc', (isset($fields['metadesc']['language'])? $fields['metadesc']['language'] : array())) }}</td>
						<td>{{ $row->metadesc}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Default', (isset($fields['default']['language'])? $fields['default']['language'] : array())) }}</td>
						<td>{{ $row->default}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Pagetype', (isset($fields['pagetype']['language'])? $fields['pagetype']['language'] : array())) }}</td>
						<td>{{ $row->pagetype}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Labels', (isset($fields['labels']['language'])? $fields['labels']['language'] : array())) }}</td>
						<td>{{ $row->labels}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Relawan/Reseller', (isset($fields['userid']['language'])? $fields['userid']['language'] : array())) }}</td>
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Image', (isset($fields['image']['language'])? $fields['image']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->image,$fields['image'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Mushaf', (isset($fields['mushaf']['language'])? $fields['mushaf']['language'] : array())) }}</td>
						<td>{{ $row->mushaf}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Donatur', (isset($fields['donatur']['language'])? $fields['donatur']['language'] : array())) }}</td>
						<td>{{ $row->donatur}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
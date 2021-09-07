@extends('layouts.app')

@section('content')
<div class="page-titles">
  <h2> {{ $pageTitle }} <small> {{ $pageNote }} </small></h2>
</div>
<div class="card">
	<div class="card-body">

		<div class="toolbar-nav">
			<div class="row">
				<div class="col-md-6 ">
					<div class="btn-group">
						<a href="{{ url('campaign?return='.$return) }}" class="tips btn btn-danger  btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
						@if($access['is_add'] ==1)
				   		<a href="{{ url('campaign/'.$id.'/edit?return='.$return) }}" class="tips btn btn-info btn-sm  " title="{{ __('core.btn_edit') }}"><i class="icon-note"></i></a>
						@endif
					</div>	
				</div>
				<div class="col-md-6 text-right">			
					<div class="btn-group">
				   		<a href="{{ ($prevnext['prev'] != '' ? url('campaign/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
						<a href="{{ ($prevnext['next'] != '' ? url('campaign/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-primary btn-sm "> <i class="fa fa-arrow-right"></i>  </a>			
					</div>			
				</div>	

				
				
			</div>
		</div>
	
		<div class="table-responsive">
			<table class="table  table-bordered " >
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Deadline', (isset($fields['deadline']['language'])? $fields['deadline']['language'] : array())) }}</td>
						<td>{{ $row->deadline}} </td>
						
					</tr>
				
				</tbody>	
			</table>   

		 	

		</div>
			
	</div>
</div>		
@stop

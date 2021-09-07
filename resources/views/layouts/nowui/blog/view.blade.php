<div class="section section-pills">
    <div class="container" style="padding-top:15px">
		<div id="content-pills">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-plain card-blog">
                	    <div class="card-image">
							@if(file_exists('./uploads/campaign/'.$posts->image) && $posts->image !='' )
							<img class="img img-raised rounded" src="{{ asset('uploads/campaign/'.$posts->image) }}">
							@endif
                	    </div>
                	</div>
				</div>
				<div class="col-md-6">
					<div class="typography-line">
                		<h4>
                	    	<strong>{{ $posts->title }}</strong>
						</h4>
                	</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card" data-background-color="orange">
                                <div class="card-body">
                                    <h6 class="category-social">
										<a href="{{ url('posts/category/'.$posts->category_alias ) }}">
                                    		<i class="fa fa-fire"></i><span id="categoryname"></span>
										</a>
                                    </h6>
                                    <p class="card-description">
									{{ $posts->sinopsis }}
                                    </p>
                                    <div class="card-footer">
                                        <div class="author">
											<?php if( file_exists( './uploads/users/'.$posts->avatar) && $posts->avatar !='') { ?>
												<img  class="avatar img-raised" src="{{ asset('uploads/users').'/'.$posts->avatar }} "/>
											<?php  } else { ?> 
												<img  class="avatar img-raised" src="{{ asset('uploads/users').'/avatar.png' }}"/>
											<?php } ?>
                                            <span class="category">{{ ucwords($posts->username) }}</span>
                                        </div>
                                        <div class="stats stats-right">
											<i class="fa fa-pencil"></i> {{ date("M j, Y " , strtotime($posts->created)) }}
											<i class="fa fa-eye"></i> {{ $posts->views }}x
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="padding-top:20px">
							<div class="progress-container">
                                <span class="progress-badge category">
								<?php
									if($posts->get_mushaf != 0) {
										$progress_mushaf = round($posts->get_mushaf * 100 / $posts->total_mushaf);
										$get_mushaf = $posts->get_mushaf;
									}else{
										$progress_mushaf = 0;
										$get_mushaf = 0;
									}
								?>{{ $get_mushaf }} Mushaf Dari {{$posts->total_mushaf}} Mushaf
								</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $progress_mushaf }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $progress_mushaf }}%;">
                                        <span class="progress-value category">{{ $progress_mushaf }}%</span>
                                    </div>
                                </div>
								<span class="category text-primary" style="padding-top:10px;right:0px;position:absolute">
								@if(strtotime("$posts->deadline") - strtotime("now") > 0)
									<?php
									$tgl1 = new DateTime(date("Y-m-d", strtotime($posts->deadline)));
									$tgl2 = new DateTime(date("Y-m-d", strtotime("now")));
									$d = $tgl2->diff($tgl1)->days + 1;
									echo $d." hari lagi";
									?>
								@else
									{{ 'sudah berakhir' }}
								@endif
								</span>
                            </div>
						</div>
					</div>
					<!-- batas -->
				</div>
			</div>
		</div>
		@if(Session::has('status'))
		<div style="padding-top:50px">
			@if(session('status') =='success')
			<div class="alert alert-success" role="alert">
				<div class="container">
					<div class="alert-icon">
						<i class="now-ui-icons ui-2_like"></i>
					</div>
					{!! Session::get('message') !!}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							<i class="now-ui-icons ui-1_simple-remove"></i>
						</span>
					</button>
				</div>
			</div>
			@else
			<div class="alert alert-warning" role="alert">
				<div class="container">
					<div class="alert-icon">
						<i class="now-ui-icons ui-1_bell-53"></i>
					</div>
					{!! Session::get('message') !!}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							<i class="now-ui-icons ui-1_simple-remove"></i>
						</span>
					</button>
				</div>
			</div>
			@endif
		</div>
		@endif
        <div id="navigation-pills">
            <div class="row" style="margin-top:40px">
                <div class="col-md-8">
                    <ul class="nav nav-pills nav-pills-primary nav-pills-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
                                Kisah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                                Donatur
								<span class="badge badge-primary">{{ $posts->comments }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                                Implementasi
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active" id="link7">
						{!! PostHelpers::formatContent($posts->description_program) !!}
                        </div>
                        <div class="tab-pane" id="link8">
                            <!-- START Form Donasi -->
							<form method="post" enctype="multipart/form-data" action="{{ url('posts/comment') }}" parsley-validate novalidate class="form">
							{{ csrf_field() }}
							<div class="container">
                			    <div class="row">
                			        <div class="col-md-12 ml-auto mr-auto">
                			            <div class="card card-contact">
                			                <form role="form" id="contact-form" method="post">
                			                    <div class="card-header text-center">
                			                        <h4 class="card-title">Form Donasi</h4>
                			                    </div>
                			                    <div class="card-body">
                			                        <div class="row">
                			                            <div class="col-md-6 pr-2">
                			                                <label>Atas Nama Wakaf</label>
                			                                <div class="input-group">
                			                                    <span class="input-group-addon">
                			                                        <i class="now-ui-icons users_circle-08"></i>
                			                                    </span>
                			                                    <input name='name_waqf' id='name_waqf' type="text" class="form-control" placeholder="Atas Nama Wakaf...">
                			                                </div>
                			                            </div>
                			                            <div class="col-md-6 pl-2">
                			                                <div class="form-group">
                			                                    <label>Nama Donatur</label>
                			                                    <div class="input-group">
                			                                        <span class="input-group-addon">
                			                                            <i class="now-ui-icons users_circle-08"></i>
                			                                        </span>
                			                                        <input name='name_donate' id='name_donate' type="text" class="form-control" placeholder="Nama Donatur...">
                			                                    </div>
                			                                </div>
                			                            </div>
                			                        </div>
													<div class="row">
                			                            <div class="col-md-6 pr-2">
                			                                <label>Nomor HP</label>
                			                                <div class="input-group">
                			                                    <span class="input-group-addon">
                			                                        +62
                			                                    </span>
                			                                    <input name='number_phone_donate' id='number_phone_donate' type="text" pattern="8[0-9]" minlength="9" class="form-control" placeholder="Nomor HP...">
                			                                </div>
                			                            </div>
														<div class="col-md-6 pr-2">
                			                                <label>Nominal Transfer</label>
                			                                <div class="input-group">
                			                                    <span class="input-group-addon">
                			                                        Rp.
                			                                    </span>
                			                                    <input name='nominal_donate' id='nominal_donate' type="number" pattern="[0-9]" minlength="5" class="form-control" placeholder="Nominal Transfer...">
                			                                </div>
                			                            </div>
                			                            <div class="col-md-6 pl-2">
                			                                <div class="form-group">
                			                                    <label>Domisili</label>
                			                                    <select name='domicile_donate' rows='5' id='domicile_donate' class='select2 '></select>
                			                                </div>
                			                            </div>
                			                        </div>
													<div class="form-group">
														<label>Upload Bukti Transfer</label>
													</div>
													<div class="fileinput fileinput-new text-center" data-provides="fileinput">
														<div class="fileinput-new thumbnail img-raised">
															<img src="{{ asset('frontend/nowui/img/image_placeholder.jpg') }}" alt="...">
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
														<div>
															<span class="btn btn-raised btn-round btn-default btn-file">
																<span class="fileinput-new">Pilih Bukti Transfer</span>
																<span class="fileinput-exists">Change</span>
																<input type="file" name="image_proof" accept="image/x-png,image/gif,image/jpeg">
															</span>
															<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="now-ui-icons ui-1_simple-remove"></i> Remove</a>
														</div>
													</div>
                			                        <div class="form-group">
                			                            <label>Ucapkan sebaris doa</label>
                			                            <textarea name="comments" class="form-control" id="comments" rows="6" placeholder="Katakan sesuatu disini . . ."></textarea>
                			                        </div>
                			                        <div class="row">
                			                            <div class="col-md-8">
                			                                <div class="checkbox">
																<input type="checkbox" id='servant_Allah-0' name="servant_Allah" value ='1' class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" />
                			                                    <label for="checkbox1">
																	Jadikan Donasi atas nama Hamba Allah
                			                                    </label>
                			                                </div>
                			                            </div>
                			                            <div class="col-md-4">
                			                                <button type="submit" class="btn btn-primary btn-round pull-right">Send Message</button>
															<input type="hidden" name="pageID" value="{{ $posts->pageID }}"/>    
                            								<input type="hidden" name="alias" value="{{ $posts->alias }}"/>
                            								<input type="hidden" name="userid" value="{{ $posts->userid }}"/>
                            								<input type="hidden" name="id_program" value="{{ $posts->id_program }}" />
															<input type="hidden" name="id_mushaf" value="{{ $posts->id_mushaf }}" />
															<input type="hidden" name="price_mushaf" value="{{ $posts->price_mushaf }}" />
                			                            </div>
                			                        </div>
                			                    </div>
                			                </form>
                			            </div>
                			        </div>
                			    </div>
                			</div>
							</form>
                        	    <div class="row">
                        	        <div class="col-md-12 ml-auto mr-auto">
                        	            <div class="media-area">
                        	                <h3 class="title text-center category">
                        	                    <small>{{ $posts->comments }} Donatur</small>
                        	                </h3>
											@foreach($comments as $comm)
											<div class="media" style="padding-bottom:30px">
                        	                    <a class="pull-left" href="#pablo">
                        	                        <div class="avatar">
                        	                            <img class="media-object img-raised" src="{{ asset('uploads/users').'/avatar.png' }}" alt="...">
                        	                        </div>
                        	                    </a>
												
                        	                    <div class="media-body">
                        	                        <h6 class="media-heading">
													<?php
                        							  if($comm->servant_Allah == '1') {
                        							    echo 'Hamba Allah';
                        							  }else{
                        							    echo $comm->name_donate;
                        							  }
                        							?>
                        	                            <small class="text-muted">· {{ date("M j, Y " , strtotime($comm->posted)) }}</small>
                        	                        </h6>
													{!!$comm->comments !!}
                        	                        <div class="media-footer text-right text-primary category">
													Rp {{ number_format($comm->nominal_donate,2,",",".") }}
                        	                        </div>
                        	                    </div>
												
                        	                </div>
											@endforeach
										</div>
                        	            <!-- end media-post -->
                        	        </div>
                        	    </div>
							<!-- END Form Donasi -->
                        </div>
                        <div class="tab-pane" id="link9">
						@if( $posts->implementation_program != '')
							{!! PostHelpers::formatContent($posts->implementation_program) !!}
						@else
							<span class="btn-block text-center">
							<img width="100px" src="{{ asset('frontend/default/icon/fig-empty-berita.svg') }}">
							</span>
							<span class="text-center category btn-block text-muted fs-5 mt-3">Belum ada Implementasi untuk program ini</span>
						@endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            <!-- end nav pills -->
        </div>
    </div>
</div>
<script>

  var str = "{{ $posts->category_alias }}";
  var res = str.toUpperCase();
  document.getElementById("categoryname").innerHTML = res;
	
</script>
<script type="text/javascript">
	$(document).ready(function() { 
		
		
		
		$("#domicile_donate").jCombo("{!! url('customcomments/publicselect?filter=wo_region_city:id:nama') !!}",
		{  selected_value : '0' });
		 	
		 	 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("customcomments/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>
<section class="main-article">
<div class="article">
	<div class="container">
		<div class="row row-mb-5">
			<div class="col-md-6">
				<div class="article-content">
					<div class="article-media">
            @if(file_exists('./uploads/campaign/'.$posts->image) && $posts->image !='' )
            <img src="{{ asset('uploads/campaign/'.$posts->image) }}" alt="" class="img-fluid img-responsive">
            @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="article-detail">
					<div class="article-heading">
						<a href="{{ url('posts/category/'.$posts->category_alias ) }}" title="Wakaf" class="article-category mb-1"><img width="15px" src="{{ asset('frontend/default/icon/tag-category.svg') }}"><i>Wakaf</i></a>
						<h1 class="article-title">{{ $posts->title }}</h1>
						<div class="article-summary">
							<p class="os-12 txt-600">
								{{ $posts->sinopsis }}
							</p>
						</div>
					</div>
					<div class="article-account">
                  <div class="box-avatar">
                    <?php if( file_exists( './uploads/users/'.$posts->avatar) && $posts->avatar !='') { ?>
                        <img src="{{ asset('uploads/users').'/'.$posts->avatar }} " border="0" width="40" class="avatar" />
                    <?php  } else { ?> 
                        <img alt="" src="{{ asset('uploads/users').'/avatar.png' }}" width="40" class="avatar" />
                    <?php } ?> 
                  </div>
						<div class="article-user" style="padding-left:10px">
							<div class="link-user">
								{{ ucwords($posts->username) }}
								</button>
							</div>
							<div class="loc-user">
								<div class="date-user">
								<i class="fa fa-eye" style="padding-right:10px"></i>  <span>Terlihat {{ $posts->views }}x  </span>
								</div>
								<div class="date-user">
									<span>Dibuat {{ date("M j, Y " , strtotime($posts->created)) }}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="article-status">
						<span class="os-13 txt-600 text-terkumpul">Target</span>
						<div class="article-number campaign-donate">
							<?php
							if($posts->get_mushaf != 0) {
								$progress_mushaf = round($posts->get_mushaf * 100 / $posts->total_mushaf);
								$get_mushaf = $posts->get_mushaf;
							}else{
								$progress_mushaf = 0;
								$get_mushaf = 0;
							}
							?>
							<h2>{{ $get_mushaf }} Mushaf <span>Dari {{$posts->total_mushaf}} Mushaf</span></h2>
							
              <span class="article-percent">{{ $progress_mushaf }}%</span>
						</div>
						<div class="cardbox-stat mb-2 progressbar">
              
							<div class="cardbox-progressbar" style="width: {{ $progress_mushaf }}%;"></div>
						</div>
						<div class="remain-txt remaining-day">
							<?php
							if($posts->comments == 0) {
								$donatur = 'Belum ada ';
							}else{
								$donatur = $posts->comments;
							}
							?>
							<span class="total-dermawan">{{$donatur}} donasi</span>
							<span>
              <strong>
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
              </strong>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
    <p class="message alert alert-danger " style="display:none;"></p>	
	 
                        @if(Session::has('status'))
                          @if(session('status') =='success')
                            <p class="alert alert-success">
                            {!! Session::get('message') !!}
                          </p>
                        @else
                          <p class="alert alert-danger">
                            {!! Session::get('message') !!}
                          </p>
                        @endif		
                      @endif

                    <ul class="parsley-error-list">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
		<div class="row">
			<div class="col-md-8">
				<div class="article-tabs">
					<ul class="nav nav-campaign" id="campaign-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="pills-kisah-tab" data-bs-toggle="pill" data-bs-target="#pills-kisah" href="#pills-kisah" role="tab" aria-selected="true">Kisah</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="donations-tab" data-bs-toggle="pill" data-bs-target="#donations" href="#donations" role="tab" aria-selected="false">Donatur<span class="badge bg-greenyblue count-sedekah">{{ $donatur }}</span>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="implementations-tab" data-bs-toggle="pill" data-bs-target="#implementations" href="#implementations" role="tab" aria-selected="false">Implementasi Terkini</a>
						</li>
					</ul>
					<div class="tab-content" id="campaign-tab-content">
						<div class="tab-pane fade active show" id="pills-kisah" role="tabpanel">
							{!! PostHelpers::formatContent($posts->description_program) !!}
						</div>
						<div class="tab-pane fade" id="donations" role="tabpanel">
                <div class="blog-item-comments">
                    <div>
                        <h4> Form Donasi </h4>
                         <form method="post" enctype="multipart/form-data" action="{{ url('posts/comment') }}" parsley-validate novalidate class="form">
                        {{ csrf_field() }}			
							<div class="form-group row">
								<label for="Servant Allah" class=" control-label col-md-4 ">Atas Nama Wakaf</label>
								<div class="col-md-8">
									<input  type='text' name='name_waqf' id='name_waqf' class='form-control form-control-sm ' />
								</div> 
							</div>
							<div class="form-group row">
								<label for="Servant Allah" class=" control-label col-md-4 ">Nama Donatur</label>
								<div class="col-md-8">
									<input  type='text' name='name_donate' id='name_donate' class='form-control form-control-sm ' placeholder="Isikan nama Anda"/>
								</div> 
							</div>
							<div class="form-group row">
								<label for="Nominal Donate" class=" control-label col-md-4 ">Nomer HP</label>
									<div class="col-md-8">
										<div class="input-group input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text">+62</span>
										</div>
										<input  type='text' name='number_phone_donate' id='number_phone_donate' class='form-control form-control-sm ' placeholder="812345678" />
									</div> 
								</div>		 
							</div>
							<div class="form-group row  " >
								<label for="Domicile Donate" class=" control-label col-md-4 "> Domisili </label>
										<div class="col-md-8">
										  <select name='domicile_donate' rows='5' id='domicile_donate' class='select2 '   ></select> 
										 </div> 
										 
									  </div>
							<div class="form-group row">
								<label for="Nominal Donate" class=" control-label col-md-4 ">Nominal Transfer</label>
									<div class="col-md-8">
										<div class="input-group input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input  type='number' name='nominal_donate' id='nominal_donate' class='form-control form-control-sm ' />
									</div> 
								</div>		 
							</div>
                            <textarea rows="5" placeholder="Ucapkan sebaris doa" class="form-control " required name="comments"></textarea><br />
                            <div class="form-group row">
								<div class="col-md-8">
								<label for='image_proof'> Upload Bukti Transfer</label> <br>
                            		<input type="file" name="image_proof" class="upload" accept="image/x-png,image/gif,image/jpeg"     />
                            	</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-8">
									<input type='checkbox' name='servant_Allah' value ='1' class=' filled-in' id='servant_Allah-0' />
									<label for='servant_Allah-0'> Jadikan Donasi atas nama Hamba Allah </label>  
								</div> 
							</div>
                            <button type="submit" class="btn btn-primary "> Submit Donasi </button>    
                            <input type="hidden" name="pageID" value="{{ $posts->pageID }}"/>    
                            <input type="hidden" name="alias" value="{{ $posts->alias }}"/>
                            <input type="hidden" name="userid" value="{{ $posts->userid }}"/>
                            <input type="hidden" name="id_program" value="{{ $posts->id_program }}" />
							<input type="hidden" name="id_mushaf" value="{{ $posts->id_mushaf }}" />
							<input type="hidden" name="price_mushaf" value="{{ $posts->price_mushaf }}" />                      
                        </form>
                    </div> 
                </div>
							<ul class="list-group" id="listDonations">
                @foreach($comments as $comm)
								<li class="list-group-item donate-item">
									<div class="donate-item-top">
										<div class="media-left">
                        <img src="{{ asset('uploads/users').'/avatar.png' }} " border="0" width="40" class="avatar" />
                    </div>
										<div class="media-body">
											<span class="media-heading dnt-head margin-bottom-zero strongSpan">
                        <?php
                          if($comm->servant_Allah == '1') {
                            echo 'Hamba Allah';
                          }else{
                            echo $comm->name_donate;
                          }
                        ?>
                      </span>
											<small style="font-size: 80%" class="btn-block timeAgo text-muted" data="2021-07-06T05:12:21+07:00">{{ date("M j, Y " , strtotime($comm->posted)) }}</small>
                      {!!$comm->comments !!}
											<span class="btn-block recent-donation-amount font-default margin-top-zero">Rp {{ number_format($comm->nominal_donate,2,",",".") }}</span>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						<div class="tab-pane fade" id="implementations" role="tabpanel">
							@if( $posts->implementation_program != '')
							{!! PostHelpers::formatContent($posts->description_program) !!}
							@else
							<span class="btn-block text-center">
							<img width="100px" src="{{ asset('frontend/default/icon/fig-empty-berita.svg') }}">
							</span>
							<span class="text-center btn-block text-muted fs-5 mt-3">Belum ada Implementasi untuk program ini</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="article-detail nopadding">
					<h3>Rekomendasi Lainnya</h3>
					<div class="single-card">
						<a href="https://indonesiadermawan.id/campaign/8339/investasi-abadi-dengan-wakaf-untuk-anak"><img src="https://act-sites.s3-ap-southeast-1.amazonaws.com/IndonesiaDermawan/campaigns/small/316232994909re4wobnvk1labyff2y1rpluzhy0l6gb9urcrmcw.jpg" alt="Investasi Abadi dengan Wakaf untuk Anak" class="single-card-image"></a>
						<a href="https://indonesiadermawan.id/campaign/8339/investasi-abadi-dengan-wakaf-untuk-anak" class="single-card-link">Investasi Abadi dengan Wakaf untuk Anak</a>
					</div>
				</div>
				<div class="button-group"></div>
			</div>
		</div>
	</div>
</div>
</section>
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
	

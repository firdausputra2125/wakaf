<link href="{{ asset('frontend/default/js/owlcarousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('frontend/default/js/owlcarousel/owl.carousel.min.js') }}"></script>
<!--==========================
  Headline Section
============================-->
@if( $mode =='all')
<section id="headline" class="wow fadeInUp" style="padding-top:70px">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="padding:25px">
        <div class="owl-carousel headline-carousel">
          @foreach( $headline as $hl)
          <a href="{{ url('posts/read/'.$hl->alias) }}">
            <img src="{{ $hl->image }}">
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section><!-- #Headline -->
@else


  <div class="container">   
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " ><a href="{{ url('') }}"> Home </a></li>
         <li class="breadcrumb-item " ><a href="{{ url('posts') }}"> Posts </a></li>
         <!-- <li class="breadcrumb-item " aria-current="page" > {{ $categoryDetail->name }} </li> -->
      </ol>
    </nav>

    <div class="section-header">
    <!-- <h2>  Category : {{ $categoryDetail->name }} </h2> -->
      
    </div>
  </div>
@endif 


<section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">  


   
        <!-- Row Starts -->
        <div class="row">  

          



          <div class="col-md-12 ">
            
            <div class="container">
              <div class="row">
            @foreach( $posts as $post)
                <div class="col-md-4" style="margin-bottom:20px">
                  <a href="{{ url('posts/read/'.$post->alias) }}">
                  <div class="card card-blog">
                    <div class="container">
                      <div class="row">
                        <div class="col-6 col-md-12" style="padding:0px">
                          <div class="card-image">
                            @if(file_exists('./uploads/campaign/'.$post->image) && $post->image !='' )
                            <img class="img rounded" src="{{ asset('uploads/campaign/'.$post->image) }}">
                            @else
                            <img class="img rounded" src="{{ asset('uploads/images/no-image.png') }}">
                            @endif
                          </div>
                        </div>
                        <div class="col-6 col-md-12">
                          <div>
                              <h6 class="card-title">
                                {{ $post->title }}
                              </h6>
                              <p class="card-description" style="line-height:1" rel="tooltip" data-placement="bottom" target="_blank" data-original-title="{{$post->sinopsis}}">
                              <small style="color:black">{{ substr($post->sinopsis,0,110) }}...</small>
                              </p>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-bottom:10px">
                          <div class="progress-container progress-primary">
                            <span class="progress-badge category">
                            <?php
                              if($post->get_mushaf != 0) {
                                $progress_mushaf = round($post->get_mushaf * 100 / $post->total_mushaf);
                                $get_mushaf = $post->get_mushaf;
                              }else{
                                $progress_mushaf = 0;
                                $get_mushaf = 0;
                              }
                            ?>
                              {{ $get_mushaf }} <span>Dari {{$post->total_mushaf}} Mushaf</span>
                            </span>
                              <div class="progress" style="margin-top:0px">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $progress_mushaf }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress_mushaf }}%;">
                                      <span class="progress-value">{{ $progress_mushaf }}%</span>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>    
            @endforeach
              </div>
            </div>
          </div>
          
        

        </div><!-- Row Ends -->
        <div class="row text-center">
        {!!  $posts->links() !!}
        </div>
      </div><!-- Container Ends -->
    </section>



    <script type="text/javascript">
      $(function(){
        $("ul.pagination li a").addClass("page-link")

          // Testimonials carousel (uses the Owl Carousel library)
          $(".headline-carousel").owlCarousel({
            autoplay: true,
            dots: true,
            loop: true,
            margin:10,
            center:true,
            responsive: { 0: { items: 2 }, 768: { items: 2 }, 900: { items: 2 }, 1500: { items: 4 } }
          });

      })
    </script>

  <div class="container">   
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " ><a href="{{ url('') }}"> Home </a></li>
         <li class="breadcrumb-item " ><a href="{{ url('posts') }}"> Posts </a></li>
         <li class="breadcrumb-item " ><a href="{{ url('posts/category/'.$posts->category_alias ) }}"> {{ $posts->name }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ $title }} </li>
      </ol>
    </nav>
  </div>  

<section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">         
        <!-- Row Starts -->
        <div class="row">  
            <div class="col-md-8 ">

                 <h2> {{ $title }}</h2>
                <div class="" style="margin: 0px 0 20px;">   
                <div class="section-tool text-left ">
                    <i class="fa fa-eye "></i>  <span>  Views (<b> {{ $posts->views }} </b>)  </span>   
                    <i class="fa fa-user "></i>  <span>  {{ ucwords($posts->username) }}  </span>   
                    <i class="icon-calendar3"></i>  <span> {{ date("M j, Y " , strtotime($posts->created)) }} </span> 
                    <i class="fa fa-comment-o "></i>   <span>  {{ $posts->comments }} comment(s)  </span> 
                </div>

                <div>
                  @if(file_exists('./uploads/images/posts/'.$posts->image) && $posts->image !='' )
                  <img src="{{ asset('uploads/images/posts/'.$posts->image) }}" alt="" class="img-fluid img-responsive">
                  @endif
                </div>                                  
                  {!! PostHelpers::formatContent($posts->note) !!}  
                </div>  

                
                <h4 class="blog-item-comment-title"><i class="icon-comment"></i> Comments </h4>
                @foreach($comments as $comm)
                <div class="blog-item-comments">
                   
                    <div class="box-avatar">
                    <?php if( file_exists( './uploads/users/'.$comm->avatar) && $comm->avatar !='') { ?>
                        <img src="{{ asset('uploads/users').'/'.$comm->avatar }} " border="0" width="60" class="avatar" />
                    <?php  } else { ?> 
                        <img alt="" src="http://www.gravatar.com/avatar/{{ md5($comm->email) }}" width="60" class="avatar" />
                    <?php } ?> 
                    </div>
                    <div class="content">
                         <div class="info" >
                            {{ ucwords($comm->username) }} | 
                            {{ date("M j, Y " , strtotime($comm->posted)) }}
                        </div>
                        {!!$comm->comments !!}
                        
                    </div> 
                </div>
                @endforeach
                <div class="blog-item-comments">                   
                    <div class="box-avatar">
                        {!! SiteHelpers::avatar('60') !!}    
                    </div>
                    <div class="content">
                        <h4> Leave Comment </h4>
                         <form method="post" enctype="multipart/form-data" action="{{ url('posts/comment') }}" parsley-validate novalidate class="form">
                        {{ csrf_field() }}
                            <textarea rows="5" placeholder="Leave comments here ...." class="form-control " required name="comments"></textarea><br />
                              
                            <input type="file" name="image_proof" class="upload"   accept="image/x-png,image/gif,image/jpeg"     />
                            <div class="image_proof-preview preview-upload">
                            
                            </div>
                            <button type="submit" class="btn btn-primary "> Submit Comment </button>    
                            <input type="hidden" name="pageID" value="{{ $posts->pageID }}"/>    
                            <input type="hidden" name="alias" value="{{ $posts->alias }}"/>
                            <input type="hidden" name="userid" value="{{ $posts->userid }}"/>
                            <input type="hidden" name="id_program" value="{{ $posts->id_program }}" />                      
                        </form>
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
            </div>
            <div class="col-md-4">
                     @include('layouts.default.blog.widget')
                </div>
     
         </div> 
          

        </div><!-- Row Ends -->

      </div><!-- Container Ends -->
    </section>

    <!-- <script type="text/javascript">
        $(function(){
            $('.remove').on('click',function(){
                if(confirm('Remove comment ?'))
                {
                    return true;
                }
                return false;
            })
        })
    </script> -->
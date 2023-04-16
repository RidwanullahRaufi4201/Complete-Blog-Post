@extends('layout.master')


@section('content')

  <!-- Page Header-->
  <header class="masthead" style="background-image: url({{asset('frontend/assets/img/home-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{__('nav.post')}}</h1>
                    <span class="subheading">All latest posts</span>
                </div>
            </div>
        </div>
    </div>
</header>
      <!-- Main Content-->
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @foreach ($posts as $post)
                    
             
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{route('post.simplepost',['simplepost'=>$post->id])}}">
                        <h2 class="post-title">{{$post->title}}</h2>
                       
                    </a>
                    <p class="post-subtitle">{{$post->subtitle}}</p>
                    <p class="post-meta">
                    
                        {{$post->created_at->diffForHumans()}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach
             <div>
                {{$posts->links()}}
             </div>
         
              
            </div>
        </div>
    </div>
@endsection
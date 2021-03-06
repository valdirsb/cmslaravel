@extends('layouts.tema1.template')
@section($page->slug.'-active', 'active')

@section('content-template')

@foreach ($contents as $content)
    @if ($content->type == 1)
        <div class="hero-wrap" style="background-image: url('{{ asset($content->image) }}');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text w-100">
                    <h1 class="mb-4">{{$content->title}}</h1>
                    <p class="mb-4">{{$content->subtitle}}</p>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
    @endif
    
@endforeach


<section class="ftco-intro">
      <div class="container-fluid">
          <div class="row no-gutters">

            @foreach ($contents as $content)
                @if ($content->type == 2)
                    <div class="col-md-3 d-flex">
                        <div class="intro d-lg-flex mx-1 w-100">
                            <div class="icon">
                                <span class="{{$content->icon}}"></span>
                            </div>
                            <div class="text">
                                <h2>{{$content->title}}</h2>
                                <p>{{$content->content}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                
            @endforeach

          </div>
      </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="ftco-animate">
                
                @foreach ($contents as $content)
                    @if ($content->type == 3)
                        <h2 class="mb-3">{{$content->title}}</h2>
                        <h3 class="mb-3">{{$content->subtitle}}</h3>
                        <p>{{$content->content}}</p>
                        <p>
                            <img src="{{ asset($content->image) }}" alt="" class="img-fluid">
                        </p>
                        
                    @endif
                    
                @endforeach

            </div>
        </div>
    </div>
</section>

@yield('content')

@endsection
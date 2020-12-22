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
                @if ($content->type != 1)
                    <div class="col-md-3 d-flex">
                        <div class="intro d-lg-flex w-100">
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

@yield('content')

@endsection
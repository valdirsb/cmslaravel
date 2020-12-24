@extends('layouts.tema1.template')
@section($page->slug.'-active', 'active')

@section('content-template')


<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('temas/tema1/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span> @yield('title') <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">@yield('title')</h1>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt">
          <div class="container">
              <div class="row no-gutters">
                  <div class="col-md-6 d-flex align-items-stretch">
                      <div class="img img-3 w-100 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('temas/tema1/images/about-1.jpg') }}); position: relative;">
                          
                      </div>
                  </div>
                  <div class="col-md-6 wrap-about ftco-animate">
                        <div class="bg-light px-3 px-md-5 py-5 ">
                            <div class="heading-section">
                                <span class="subheading">Bem Vindos</span>
                                @foreach ($contents as $item)
                                    <h2 class="mb-3">{{$item->title}}</h2>
                                    <p>{{$item->content}}</p>
                                @endforeach
                            </div>
                        </div>
                  </div>
              </div>
          </div>
</section>





@endsection
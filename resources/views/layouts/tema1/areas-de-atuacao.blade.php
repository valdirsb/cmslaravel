@extends('layouts.tema1.template')
@section($page->slug.'-active', 'active')

@section('content-template')


<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('temas/tema1/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Áreas de Atuação <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">Áreas de Atuação</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center pb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Áreas de Atuação</span>
          <h2>Onde Atuamos</h2>
        </div>
      </div>
            <div class="row">
                @foreach ($contents as $item)
                    <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                        <div class="services-2 text-center">
                            <div class="icon-wrap">
                                <div class="mini-icon d-flex align-items-center justify-content-center"><span class="{{$item->icon}}"></span></div>
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="{{$item->icon}}"></span>
                                </div>
                            </div>
                            <h2>{{$item->title}}</h2>
                            <p>{{$item->content}}</p>
                        </div>
                    </div>  
              @endforeach
            </div>
      </div>
  </section>

@endsection
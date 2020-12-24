@extends('layouts.tema1.template')
@section($page->slug.'-active', 'active')

@section('content-template')


<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('temas/tema1/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>@yield('title')<span><i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">@yield('title')</h1>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">

            @foreach ($contents as $item)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset($item->image) }});"></div>
                        </div>
                        <div class="text pt-3 text-center">
                            <h3>{{$item->title}}</h3>
                            <span class="position mb-2">{{$item->subtitle}}</span>
                            <div class="faded">
                                <p>{{$item->content}}</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a></li>
                                    <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                  
        </div>
    </div>
</section>


@yield('content')

@endsection
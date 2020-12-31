@extends('layouts.tema1.template')
@section($page->slug.'-active', 'active')

@section('content-template')


<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('temas/tema1/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>@yield('title') <span><i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">@yield('title')</h1>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper px-md-4">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                        <p><span>Endereço:</span> {{$front_config['address']}} </p>
                    </div>
                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                        <p><span>Telefone:</span> <a href="tel://1234567920">{{$front_config['fone']}}</a></p>
                    </div>
                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{$front_config['email']}}</a></p>
                    </div>
                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                    </div>
                </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Entre em contato conosco</h3>
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Nome Completo</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Endereço de e-mail</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Assunto</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Mensagem</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mensagem"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Enviar" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 order-md-first d-flex align-items-stretch">
                            <div  class="map" style="position: relative; overflow: hidden; width:100%">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2349.378875424913!2d-34.857042477111996!3d-7.981522599919558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab22a92d56ed8f%3A0x97ec20f2a5e612d3!2sClinorte%20Composi%C3%A7%C3%A3o%20e%20Assist%20Tec%20em%20Clich%C3%AAs%20Ltda!5e0!3m2!1spt-BR!2sbr!4v1609292744856!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@yield('content')

@endsection
@extends('panel.layout')
@section('content')
    <section id="home" class="hero section dark-background hero-top">

      <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">PLAN. LAUNCH. GROW.</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Get Started</a>
          <a href="{{ asset('assets/videos/hero-video.mp4') }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>

    </section>

    @include('panel.pages.about')
    @include('panel.pages.stats')
    @include('panel.pages.service')
    @include('panel.pages.clients')
    @include('panel.pages.features')
    @include('panel.pages.testimonials')
    @include('panel.pages.portfolio')
    @include('panel.pages.contact')

@endsection
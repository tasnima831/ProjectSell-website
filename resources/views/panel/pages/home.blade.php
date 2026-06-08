@extends('panel.layout')
@section('content')
    

    <section id="home" class="hero section dark-background hero-top">
      <img src="https://images.unsplash.com/photo-1738566061962-bdf29f1b2487?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100" class="word-shuffler">
            <span>SELL.</span> <span>PURCHASE.</span> <span>LEARN.</span>
        </h2>
        <p data-aos="fade-up" data-aos-delay="200">You can sell your projects, purchase what you need, and learn new skills all in one place.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Get Started</a>
          <a href="{{ asset('assets/videos/hero-video.mp4') }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>

    </section>

    @include('panel.pages.about')
    @include('panel.pages.stats')
    @include('panel.pages.projects')
    @include('panel.pages.clients')
    @include('panel.pages.features')
    @include('panel.pages.testimonials')
    @include('panel.pages.portfolio')
    @include('panel.pages.contact')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const shuffler = document.querySelector('.word-shuffler');
            const words = shuffler.querySelectorAll('span');
            let index = 0;

            function cycleHighlight() {
                words.forEach(word => word.classList.remove('active'));
                words[index].classList.add('active');
                index = (index + 1) % words.length;
            }

            setTimeout(() => {
                shuffler.classList.add('rotating');
                cycleHighlight();
                setInterval(cycleHighlight, 1500);
            }, 2500); 
        });
    </script>
    <style>
        .word-shuffler {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            transition: all 0.5s ease;
        }
        .word-shuffler span {
            display: inline-block;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .word-shuffler.rotating span {
            opacity: 0.4;
            transform: scale(0.9);
        }
        .word-shuffler.rotating span.active {
            opacity: 1;
            transform: scale(1.15);
            color: #fff;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.4);
        }
    </style>
@endsection
@extends('panel.layout')
@section('content')
    

    <section id="home" class="hero section dark-background hero-top">
      <img src="https://images.unsplash.com/photo-1738566061962-bdf29f1b2487?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100" class="word-shuffler">
            <span>SELL.</span> <span>PURCHASE.</span> <span>LEARN.</span>
        </h2>
        <p data-aos="fade-up" data-aos-delay="200">You can sell your projects, purchase what you need, and learn new skills all in one place.</p>
        
        <div class="w-100 mt-4" style="max-width: 750px;" data-aos="fade-up" data-aos-delay="300">
          <form action="#" method="GET" class="input-group input-group-lg shadow">
            <input type="text" name="search" class="form-control border-0" placeholder="Search projects..." style="border-radius: 50px 0 0 50px; padding-left: 25px; font-size: 1rem;">
            <select name="price" class="form-select border-0 border-start" style="max-width: 130px; font-size: 0.9rem; cursor: pointer;">
              <option value="" selected disabled>Price</option>
              <option value="free">Free</option>
              <option value="premium">Premium</option>
            </select>
            <select name="category" class="form-select border-0 border-start" style="max-width: 130px; font-size: 0.9rem; cursor: pointer;">
              <option value="" selected disabled>Category</option>
              <option value="app">App</option>
              <option value="website">Website</option>
              <option value="uiux">UI UX</option>
            </select>
            <select name="language" class="form-select border-0 border-start" style="max-width: 130px; font-size: 0.9rem; cursor: pointer;">
              <option value="" selected disabled>Language</option>
              <option value="php">PHP</option>
              <option value="python">Python</option>
            </select>
            <button class="btn btn-get-started border-0 m-0 px-4 d-flex align-items-center" type="submit" style="border-radius: 0 50px 50px 0; background: var(--accent-color); color: white;">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>

    </section>
    
    @include('panel.pages.projects')
    @include('panel.pages.featured_projects')    
    @include('panel.pages.stats')
    @include('panel.pages.clients')
    @include('panel.pages.features')
    @include('panel.pages.testimonials')
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

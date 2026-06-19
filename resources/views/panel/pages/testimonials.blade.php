<section id="testimonials" class="testimonials section dark-background">
  <img src="{{ asset('assets/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 2000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          }
        }
      </script>

      <div class="swiper-wrapper">
        @forelse (($testimonialReviews ?? collect()) as $review)
          <div class="swiper-slide">
            <div class="testimonial-item">
              <h3>{{ $review->user->name ?? 'Guest reviewer' }}</h3>
              <h4>{{ $review->project->title ?? 'Project Review' }}</h4>
              <div class="stars">
                @for ($i = 1; $i <= 5; $i++)
                  <i class="bi bi-star{{ $i <= (int) $review->rating ? '-fill' : '' }}"></i>
                @endfor
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>{{ $review->message }}</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        @empty
          <div class="swiper-slide">
            <div class="testimonial-item">
              <h3>ProjectSell</h3>
              <h4>Reviews</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Customer reviews will appear here after users submit feedback on project detail pages.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        @endforelse
      </div>

      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

@extends('panel.layout')
@section('content')

<section id="project-details" class="section py-5">
  <div class="container">
    <div class="row align-items-center gy-5">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <p class="text-uppercase text-muted mb-3">The Fine Print Book Collection</p>
        <h1 class="display-5 fw-bold">Best Offer Save 30%. Grab it now!</h1>
        <p class="lead text-secondary mb-4">Discover our curated selection of premium books with fast delivery, reliable quality, and exclusive offers.</p>

        <div class="d-flex flex-wrap gap-3 mb-5">
          <a href="#" class="btn-get-started">Shop Collection</a>
          <a href="#" class="btn btn-outline-secondary d-flex align-items-center"><i class="bi bi-arrow-right-circle me-2"></i>View Details</a>
        </div>

        <div class="row g-3">
          <div class="col-sm-6">
            <div class="p-3 bg-white rounded-4 shadow-sm h-100">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-truck fs-3 text-primary"></i>
                <div>
                  <h5 class="mb-1">Free Delivery</h5>
                  <p class="mb-0 text-muted small">Consectetur adipi elit lorem ipsum dolor sit amet.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 bg-white rounded-4 shadow-sm h-100">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-shield-check fs-3 text-primary"></i>
                <div>
                  <h5 class="mb-1">Quality Guarantee</h5>
                  <p class="mb-0 text-muted small">Dolor sit amet ontear epis umcons ectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 bg-white rounded-4 shadow-sm h-100">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-gift fs-3 text-primary"></i>
                <div>
                  <h5 class="mb-1">Daily Offers</h5>
                  <p class="mb-0 text-muted small">Amet consectetur adipisci elit lorema ipsum dolor sit amet.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="p-3 bg-white rounded-4 shadow-sm h-100">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-lock fs-3 text-primary"></i>
                <div>
                  <h5 class="mb-1">100% Secure Payment</h5>
                  <p class="mb-0 text-muted small">Trusted checkout with secure encryption and fast processing.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="position-relative project-details-hero rounded-5 overflow-hidden shadow-lg">
          <div class="project-details-gradient"></div>

          <div class="swiper init-swiper project-details-slider h-100">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 900,
                "autoplay": {
                  "delay": 2800,
                  "disableOnInteraction": false
                },
                "slidesPerView": 1,
                "pagination": {
                  "el": ".project-details-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".project-details-next",
                  "prevEl": ".project-details-prev"
                }
              }
            </script>

            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="project-details-card rounded-5 overflow-hidden shadow-lg">
                  <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=700&q=80" alt="Book collection" class="img-fluid rounded-5">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="project-details-card rounded-5 overflow-hidden shadow-lg">
                  <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=700&q=80" alt="Book collection" class="img-fluid rounded-5">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="project-details-card rounded-5 overflow-hidden shadow-lg">
                  <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=700&q=80" alt="Book collection" class="img-fluid rounded-5">
                </div>
              </div>
            </div>

            <div class="project-details-pagination swiper-pagination"></div>

            <div class="project-details-prev swiper-button-prev rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-chevron-left"></i>
            </div>
            <div class="project-details-next swiper-button-next rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-chevron-right"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  .project-details-hero {
    min-height: 560px;
    background: transparent;
    box-shadow: 0 32px 80px rgba(17, 24, 39, 0.14);
  }
  .project-details-gradient {
    display: none;
  }
  .project-details-slider {
    position: relative;
    height: 100%;
    padding: 1.5rem;
  }
  .project-details-card {
    max-width: 520px;
    width: 100%;
    aspect-ratio: 1 / 1;
    margin: 0 auto;
    background: transparent;
    box-shadow: 0 56px 130px rgba(15, 23, 42, 0.18);
    border-radius: 2rem;
    overflow: hidden;
    border: 1px solid rgba(15, 23, 42, 0.08);
  }
  .project-details-card img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .project-details-prev,
  .project-details-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 2.6rem;
    height: 2.6rem;
    border: 1px solid rgba(15, 23, 42, 0.12);
    background: rgba(255, 255, 255, 0.75);
    color: #111827;
    box-shadow: 0 14px 32px rgba(15, 23, 42, 0.12);
    transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
    z-index: 20;
  }
  .project-details-prev {
    left: 1rem;
  }
  .project-details-next {
    right: 1rem;
  }
  .project-details-prev:hover,
  .project-details-next:hover {
    transform: translateY(-50%) scale(1.08);
    box-shadow: 0 22px 46px rgba(15, 23, 42, 0.2);
    background: rgba(255, 255, 255, 0.9);
  }
  .project-details-pagination.swiper-pagination-bullets {
    bottom: 1.25rem;
  }
  .project-details-pagination .swiper-pagination-bullet {
    background: rgba(15, 23, 42, 0.22);
    opacity: 1;
  }
  .project-details-pagination .swiper-pagination-bullet-active {
    background: #0d6efd;
  }
</style>

@endsection
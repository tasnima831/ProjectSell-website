@extends('panel.layout')
@section('content')

<section id="portfolio-details" class="portfolio-details section py-5" style="background-color: #f8f9fa;">
    <div class="container bg-white rounded-4 shadow-sm p-4 p-lg-5" data-aos="fade-up">
        
        <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
            <div class="d-flex gap-4 fw-medium text-secondary">
                <a href="#" class="text-decoration-none text-dark border-bottom border-2 border-dark pb-1">Sofas</a>
                <a href="#" class="text-decoration-none text-muted">Chairs</a>
                <a href="#" class="text-decoration-none text-muted">Beds</a>
            </div>
            <div class="text-center">
                <div class="fw-bold fs-4 text-uppercase tracking-wider" style="letter-spacing: 1px;">
                    <i class="bi bi- armchair me-1"></i> Furniture
                </div>
            </div>
            <div class="d-flex gap-3 text-secondary fs-5">
                <a href="#" class="text-inherit text-muted"><i class="bi bi-person"></i></a>
                <a href="#" class="text-inherit text-muted"><i class="bi bi-heart"></i></a>
                <a href="#" class="text-inherit text-muted position-relative">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark small" style="font-size: 0.6rem;">2</span>
                </a>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-md-10 order-md-2">
                        <div class="p-4 rounded-3 d-flex align-items-center justify-content-center style-gallery-main">
                            <img src="{{ asset('assets/img/portfolio/product-1.jpg') }}" id="mainProductImage" class="img-fluid object-fit-contain" alt="Ilana Green Sofa" style="max-height: 400px;">
                        </div>
                    </div>

                    <div class="col-md-2 order-md-1">
                        <div class="d-flex flex-row flex-md-column gap-2 tool-thumbnails">
                            <div class="thumbnail-box active border p-1 rounded cursor-pointer"><img src="{{ asset('assets/img/portfolio/product-1.jpg') }}" class="img-fluid"></div>
                            <div class="thumbnail-box border p-1 rounded cursor-pointer"><img src="{{ asset('assets/img/portfolio/product-1-side.jpg') }}" class="img-fluid"></div>
                            <div class="thumbnail-box border p-1 rounded cursor-pointer"><img src="{{ asset('assets/img/portfolio/product-1-angle.jpg') }}" class="img-fluid"></div>
                            <div class="thumbnail-box border p-1 rounded cursor-pointer"><img src="{{ asset('assets/img/portfolio/product-1-back.jpg') }}" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 ps-lg-4 border-start-lg">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h1 class="display-6 fw-bold m-0">Ilana</h1>
                    <button class="btn btn-outline-secondary btn-sm rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-heart"></i>
                    </button>
                </div>

                <p class="text-muted small mb-4 lead" style="font-size: 0.95rem; line-height: 1.5;">
                    A sectional sofa or an L shaped sofa can make a great addition to your living room based on your needs.
                </p>

                <h2 class="fw-bold mb-3">$ 430.99</h2>

                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="text-warning small">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <a href="#" class="text-decoration-underline text-muted small fw-medium">441 reviews</a>
                </div>

                <div class="mb-5">
                    <span class="text-muted d-block small mb-2 fw-medium">Colour</span>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="color-swatch" style="background-color: #f0ad4e;"></button>
                        <button class="color-swatch" style="background-color: #999999;"></button>
                        <button class="color-swatch" style="background-color: #637a91;"></button>
                        <button class="color-swatch active" style="background-color: #556b2f;"></button>
                        <button class="color-swatch" style="background-color: #1a365d;"></button>
                    </div>
                </div>

                <div class="row g-3 mb-5">
                    <div class="col-sm-6">
                        <button class="btn btn-outline-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-buy">Buy Now</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket">Add to basket</button>
                    </div>
                </div>

                <div class="border-top">
                    <div class="py-3 d-flex justify-content-between align-items-center border-bottom text-muted small position-relative">
                        <div>
                            <span class="text-dark fw-medium">Dispatched in 5 - 7 weeks</span> 
                            <i class="bi bi-info-circle ms-1 cursor-pointer text-muted" style="font-size: 0.8rem;"></i>
                            <a href="#" class="d-block text-decoration-underline text-muted mt-1" style="font-size: 0.75rem;">Why the longer lead time?</a>
                        </div>
                        <i class="bi bi-chevron-right text-secondary"></i>
                    </div>
                    <div class="py-3 d-flex justify-content-between align-items-center border-bottom text-muted small">
                        <div>
                            <span class="text-dark fw-medium">Home Delivery</span> — $ 10
                        </div>
                        <i class="bi bi-chevron-right text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-5 pt-5 border-top">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="fw-bold mb-4">Customer Reviews</h3>
                    <div class="p-4 bg-light rounded-3 text-center border mb-4">
                        <h1 class="display-4 fw-bold mb-0">4.8</h1>
                        <div class="text-warning mb-2 fs-5">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                        </div>
                        <p class="text-muted small mb-0">Based on 441 reviews</p>
                    </div>

                    @auth
                        <div class="p-4 border rounded-3 bg-white shadow-sm">
                            <h6 class="fw-bold mb-3 text-dark">Leave a Review</h6>
                            <form action="#" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="text-warning fs-4 rating-input">
                                        <i class="bi bi-star cursor-pointer" data-value="1"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="2"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="3"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="4"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="5"></i>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control rounded-1 shadow-none" rows="4" placeholder="How was your experience with this project?"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-2 fw-bold text-uppercase rounded-1">Post Review</button>
                            </form>
                        </div>
                    @else
                        <div class="p-4 border rounded-3 bg-light text-center">
                            <p class="small text-muted mb-3">Please log in to share your feedback on this project.</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm fw-bold px-4 rounded-1">Login</a>
                        </div>
                    @endauth
                </div>

                <div class="col-lg-8">
                    <div class="ps-lg-4 mt-4 mt-lg-5">
                        @foreach([['name' => 'Alex Johnson', 'date' => 'Oct 24, 2023', 'rating' => 5], ['name' => 'Emily Davis', 'date' => 'Oct 20, 2023', 'rating' => 4]] as $review)
                        <div class="d-flex gap-3 mb-4 pb-4 border-bottom last-child-border-0">
                            <img src="https://i.pravatar.cc/50?u={{$review['name']}}" class="rounded-circle flex-shrink-0 border" width="50" height="50" alt="">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="fw-bold mb-0 small">{{ $review['name'] }}</h6>
                                    <small class="text-muted">{{ $review['date'] }}</small>
                                </div>
                                <div class="text-warning small mb-2">
                                    @for($i=0; $i < 5; $i++)
                                        <i class="bi bi-star{{ $i < $review['rating'] ? '-fill' : '' }}"></i>
                                    @endfor
                                </div>
                                <p class="text-muted small mb-0">This project provided exactly what I was looking for. The documentation is clear and the integration was seamless. Great job!</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="similar-projects" class="section py-5 border-top bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-start mb-5">
            <h2 class="fw-bold h3">Similar Projects</h2>
            <p class="text-muted">Explore more projects that fit your interests.</p>
        </div>
        <div class="row gy-4 services">
            @foreach([
                ['name' => 'E-Commerce Dashboard', 'img' => 'app-1.jpg', 'price' => '$49.00', 'rating' => 4.8, 'reviews' => 124],
                ['name' => 'Admin SaaS Template', 'img' => 'product-2.jpg', 'price' => 'Free', 'rating' => 4.5, 'reviews' => 89],
                ['name' => 'Real Estate App UI', 'img' => 'branding-3.jpg', 'price' => '$29.00', 'rating' => 4.9, 'reviews' => 56]
            ] as $project)
            <div class="col-lg-4 col-md-6">
                <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">
                    <div class="img h-100 w-100">
                        <img src="{{ asset('assets/img/portfolio/'.$project['img']) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="">
                    </div>
                    <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center" style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="d-flex justify-content-center align-items-center gap-3 mb-1">
                            <div class="d-flex align-items-center gap-1">
                                <div class="text-warning small" style="font-size: 0.8rem; position: relative; left: -71px;"><i class="bi bi-star-fill"></i></div>
                                <span class="text-dark small fw-bold" style="position: relative; left: -70px;">{{ $project['rating'] }}</span>
                                <span class="text-muted small" style="font-size: 0.75rem; position: relative; left: -70px;">({{ $project['reviews'] }})</span>
                            </div>
                            <span class="fw-bold {{ $project['price'] == 'Free' ? 'text-success' : 'text-dark' }}" style="font-size: 1rem; position: relative; right: -70px;">{{ $project['price'] }}</span>
                        </div>
                        <a href="{{ route('panel.pages.project-details') }}" class="stretched-link text-decoration-none">
                            <h3 class="fs-6 fw-bold text-dark mb-0">{{ $project['name'] }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating-input i');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const val = this.getAttribute('data-value');
            stars.forEach(s => {
                if (parseInt(s.getAttribute('data-value')) <= parseInt(val)) {
                    s.classList.remove('bi-star');
                    s.classList.add('bi-star-fill');
                } else {
                    s.classList.remove('bi-star-fill');
                    s.classList.add('bi-star');
                }
            });
        });
    });
});
</script>

<style>
    .style-gallery-main {
        background-color: #f1f3f2;
        min-height: 420px;
        border-radius: 12px;
    }
    .thumbnail-box {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f3f2;
        cursor: pointer;
        opacity: 0.7;
        transition: all 0.2s ease-in-out;
    }
    .thumbnail-box img {
        max-height: 100%;
        object-fit: contain;
    }
    .thumbnail-box:hover, .thumbnail-box.active {
        opacity: 1;
        border-color: #212529 !important;
    }
    .color-swatch {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: 1px solid rgba(0,0,0,0.1);
        padding: 0;
        position: relative;
        transition: transform 0.15s ease;
    }
    .color-swatch:hover {
        transform: scale(1.1);
    }
    .color-swatch.active::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 25%;
        width: 50%;
        height: 2px;
        background-color: #212529;
    }
    .btn-buy {
        border-color: #212529;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }
    .btn-basket {
        background-color: #111111;
        border: none;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .last-child-border-0:last-child {
        border-bottom: 0 !important;
    }
    .rating-input i {
        transition: color 0.2s, transform 0.2s;
    }
    .rating-input i:hover {
        transform: scale(1.1);
    }
    .project-card {
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12) !important;
    }
    .project-card .img img { transition: transform 0.5s ease; }
    .project-card:hover .img img { transform: scale(1.05); }
    
    @media (min-width: 992px) {
        .border-start-lg {
            border-left: 1px solid #e9ecef !important;
        }
    }

    
.services .details {
    background: 
 color-mix(in srgb, var(--surface-color), transparent 5%);
    padding: 50px 30px;
    margin: -100px 30px 0 0px;
    transition: all ease-in-out 0.3s;
    position: relative;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0px 0 25px rgba(0, 0, 0, 0.1);
}
</style>

@endsection
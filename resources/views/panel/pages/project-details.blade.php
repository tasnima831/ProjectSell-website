@extends('panel.layout')

@section('content')
<section id="portfolio-details" class="portfolio-details section py-5" style="background-color: #f8f9fa;">
    <div class="container bg-white rounded-4 shadow-sm p-4 p-lg-5" data-aos="fade-up">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom flex-wrap gap-3">
            <div>
                <span class="badge text-bg-light border">{{ $project->category }}</span>
                @if ($project->language)
                    <span class="badge text-bg-light border">{{ $project->language }}</span>
                @endif
            </div>

            <a href="{{ route('panel.pages.projects.index') }}" class="text-decoration-none small fw-bold">
                <i class="bi bi-arrow-left"></i> Back to all projects
            </a>
        </div>

        <div class="row g-5">
            <div class="col-lg-7">
                @php($images = $project->imageUrls())
                <div class="row g-3">
                    <div class="col-md-10 order-md-2">
                        <div class="p-4 rounded-3 d-flex align-items-center justify-content-center style-gallery-main">
                            <img src="{{ $images[0] }}" id="mainProductImage" class="img-fluid object-fit-contain" alt="{{ $project->title }}" style="max-height: 400px;">
                        </div>
                    </div>

                    <div class="col-md-2 order-md-1">
                        <div class="d-flex flex-row flex-md-column gap-2 tool-thumbnails">
                            @foreach ($images as $image)
                                <div class="thumbnail-box {{ $loop->first ? 'active' : '' }} border p-1 rounded cursor-pointer" role="button" tabindex="0">
                                    <img src="{{ $image }}" class="img-fluid" alt="{{ $project->title }} image {{ $loop->iteration }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 ps-lg-4 border-start-lg">
                <div class="d-flex justify-content-between align-items-start mb-2 gap-3">
                    <h1 class="display-6 fw-bold m-0">{{ $project->title }}</h1>
                    
                </div>

                <p class="text-muted small mb-4 lead" style="font-size: 0.95rem; line-height: 1.5;">
                    {{ $project->one_line_description ?: 'No short summary added yet.' }}
                </p>
                <div class="mb-4">
                <span class="fw-bold {{ $project->status === 'free' ? 'text-success' : 'text-dark' }}" style="font-size: 1.25rem;">
                        {{ $project->priceLabel() }}
                    </span>
                </div>

                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="text-warning small">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= round((float) $project->rating) ? '-fill' : '' }}"></i>
                        @endfor
                    </div>
                    <span class="text-muted small fw-medium">{{ number_format((float) $project->rating, 1) }} rating</span>
                </div>

                <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom creator-profile">
                    <img src="{{ $project->creatorProfileUrl() }}" class="rounded-circle border flex-shrink-0 object-fit-cover" width="56" height="56" alt="{{ $project->creator_name ?: 'Project creator' }}">
                    <div>
                        <span class="text-muted small d-block">Created by</span>
                        <p class="text-muted small mb-0">{{ $project->creator_name ?: 'Unknown creator' }}</p>
                        <h6 class="fw-bold mb-1">{{ $project->company_name ?: 'Independent Seller' }}</h6>
                    </div>
                </div>

                <div class="row g-3 mb-5">
                    <div class="col-sm-6">
                        <a href="{{ route('panel.pages.bill') }}" class="btn btn-outline-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-buy d-flex align-items-center justify-content-center">Buy Now</a>
                    </div>
                    <div class="col-sm-6">
                        @if ($project->project_link)
                            <a href="{{ $project->project_link }}" target="_blank" rel="noopener" class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket d-flex align-items-center justify-content-center text-white">Live Link</a>
                        @else
                            <a href="{{ route('panel.pages.videos') }}" class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket d-flex align-items-center justify-content-center text-white">Watch Videos</a>
                        @endif
                    </div>
                    @if ($project->project_file_path)
                        <div class="col-12">
                            <a href="{{ asset('storage/' . $project->project_file_path) }}" class="btn btn-light border w-100 py-3 fw-bold rounded-1 text-uppercase" download>
                                <i class="bi bi-download"></i> Download Project File
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-5 border-top pt-5">
            <div class="row g-4">
                <div class="col-12">
                    <h4 class="fw-bold mb-4">Technical Stack</h4>
                    <div class="p-4 bg-light rounded-3 mb-5">
                        @if ($project->tech_used)
                            <p class="text-muted mb-0" style="white-space: pre-line;">{{ $project->tech_used }}</p>
                        @else
                            <p class="text-muted mb-0">No technical stack added yet.</p>
                        @endif
                    </div>

                    <h4 class="fw-bold mb-4">Description</h4>
                    <div class="p-4 bg-light rounded-3">
                        <p class="text-muted mb-0 lead" style="font-size: 1rem; white-space: pre-line;">{{ $project->description ?: 'No description added yet.' }}</p>
                    </div>
                </div>
            </div>
        </div>
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



@if (($similarProjects ?? collect())->count())
    <section id="similar-projects" class="section py-5 border-top bg-light">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-start mb-5">
                <h2 class="fw-bold h3">Similar Projects</h2>
                <p class="text-muted">Explore more projects that fit your interests.</p>
            </div>
            <div class="row gy-4 services">
                @foreach ($similarProjects as $similarProject)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">
                            <div class="img h-100 w-100">
                                <img src="{{ $similarProject->imageUrl() }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $similarProject->title }}">
                            </div>
                            @if ($similarProject->language)
                                <div class="project-language-bar position-absolute rounded-3 text-center">{{ $similarProject->language }}</div>
                            @endif
                            <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center" style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                <div class="d-flex justify-content-between align-items-center gap-3 mb-1">
                                    <span class="text-warning small"><i class="bi bi-star-fill"></i> <span class="text-dark fw-bold">{{ number_format((float) $similarProject->rating, 1) }}</span></span>
                                    <span class="fw-bold {{ $similarProject->status === 'free' ? 'text-success' : 'text-dark' }}">{{ $similarProject->priceLabel() }}</span>
                                </div>
                                <a href="{{ route('panel.pages.project-details', $similarProject) }}" class="stretched-link text-decoration-none">
                                    <h3 class="fs-6 fw-bold text-dark mb-0">{{ $similarProject->title }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainImage = document.getElementById('mainProductImage');
        const thumbnails = document.querySelectorAll('.thumbnail-box');

        thumbnails.forEach(function (thumbnail) {
            const selectThumbnail = function () {
                const thumbnailImage = thumbnail.querySelector('img');

                if (!mainImage || !thumbnailImage) {
                    return;
                }

                mainImage.src = thumbnailImage.src;
                mainImage.alt = thumbnailImage.alt;

                thumbnails.forEach(function (item) {
                    item.classList.remove('active');
                });

                thumbnail.classList.add('active');
            };

            thumbnail.addEventListener('click', selectThumbnail);
            thumbnail.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    selectThumbnail();
                }
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

    .thumbnail-box:hover,
    .thumbnail-box.active {
        opacity: 1;
        border-color: #212529 !important;
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

    .project-card {
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12) !important;
    }

    .project-card .img img {
        transition: transform 0.5s ease;
    }

    .project-card:hover .img img {
        transform: scale(1.05);
    }

    .services .details {
        background: color-mix(in srgb, var(--surface-color), transparent 5%);
        padding: 50px 30px;
        margin: -100px 30px 0 0px;
        transition: all ease-in-out 0.3s;
        position: relative;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 0 25px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 992px) {
        .border-start-lg {
            border-left: 1px solid #e9ecef !important;
        }
    }
</style>
@endsection

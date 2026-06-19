@extends('panel.layout')

@section('content')
<section id="portfolio-details" class="portfolio-details section py-5" style="background-color: #f8f9fa;">
    <div class="container bg-white rounded-4 shadow-sm p-4 p-lg-5" data-aos="fade-up">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-warning">{{ session('error') }}</div>
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
                    @if ($project->creatorProfileUrl())
                        <img src="{{ $project->creatorProfileUrl() }}" class="rounded-circle border flex-shrink-0 object-fit-cover" width="56" height="56" alt="{{ $project->creator_name ?: 'Project creator' }}">
                    @endif
                    <div>
                        <span class="text-muted small d-block">Created by</span>
                        <p class="text-muted small mb-0">{{ $project->creator_name ?: 'Unknown creator' }}</p>
                        <h6 class="fw-bold mb-1">{{ $project->company_name ?: 'Independent Seller' }}</h6>
                    </div>
                </div>

                <div class="row g-3 mb-5">
                    @if ($isProjectOwner)
                        <div class="col-sm-6">
                            <a href="{{ route('panel.pages.projects.edit', $project) }}" class="btn btn-outline-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-buy d-flex align-items-center justify-content-center">Edit Project</a>
                        </div>
                        @if ($project->project_file_path)
                            <div class="col-sm-6">
                                <a href="{{ route('panel.pages.projects.download', $project) }}" class="btn btn-light border w-100 py-3 fw-bold rounded-1 text-uppercase">
                                    <i class="bi bi-download"></i> Download File
                                </a>
                            </div>
                        @endif
                        @if ($project->hasVideos())
                            <div class="col-12">
                                <a href="{{ route('panel.pages.videos', $project) }}" class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket d-flex align-items-center justify-content-center text-white">Watch Videos</a>
                            </div>
                        @endif
                    @elseif ($project->status === 'paid' && ! $hasProjectAccess)
                        <div class="col-sm-6">
                            <a href="{{ route('panel.pages.bill', $project) }}" class="btn btn-outline-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-buy d-flex align-items-center justify-content-center">Buy Now</a>
                        </div>
                        @if ($project->hasVideos())
                            <div class="col-sm-6">
                                <a href="{{ route('panel.pages.videos', ['project' => $project, 'lesson' => 1]) }}" class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket d-flex align-items-center justify-content-center text-white">Preview Video</a>
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="alert alert-info mb-0 small">Complete the billing form to unlock the project file{{ $project->hasVideos() ? ' and all videos' : '' }}.</div>
                        </div>
                    @else
                        @if ($project->hasVideos())
                            <div class="col-sm-6">
                                <a href="{{ route('panel.pages.videos', $project) }}" class="btn btn-dark w-100 py-3 fw-bold rounded-1 text-uppercase btn-basket d-flex align-items-center justify-content-center text-white">Watch Videos</a>
                            </div>
                        @endif
                        @if ($project->project_file_path)
                            <div class="col-sm-6">
                                <a href="{{ route('panel.pages.projects.download', $project) }}" class="btn btn-light border w-100 py-3 fw-bold rounded-1 text-uppercase">
                                    <i class="bi bi-download"></i> Download File
                                </a>
                            </div>
                        @endif
                    @endif

                    @if ($project->project_link)
                        <div class="col-12">
                            <a href="{{ $project->project_link }}" target="_blank" rel="noopener" class="btn btn-outline-secondary w-100 py-3 fw-bold rounded-1 text-uppercase">Live Link</a>
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
                        <h1 class="display-4 fw-bold mb-0">{{ number_format($averageRating, 1) }}</h1>
                        <div class="text-warning mb-2 fs-5">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= round($averageRating) ? '-fill' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="text-muted small mb-0">Based on {{ $reviewCount }} reviews</p>
                    </div>

                    @auth
                        @if ($isProjectOwner)
                            <div class="p-4 border rounded-3 bg-light text-center">
                                <p class="small text-muted mb-0">You added this project, so you cannot review it.</p>
                            </div>
                        @else
                        <div class="p-4 border rounded-3 bg-white shadow-sm">
                            <h6 class="fw-bold mb-3 text-dark">Leave a Review</h6>
                            <form action="{{ route('panel.pages.projects.reviews.store', $project) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="text-warning fs-4 rating-input">
                                        <i class="bi bi-star cursor-pointer" data-value="1"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="2"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="3"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="4"></i>
                                        <i class="bi bi-star cursor-pointer" data-value="5"></i>
                                    </div>
                                    <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', 5) }}">
                                    @error('rating')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control rounded-1 shadow-none" name="message" rows="4" placeholder="How was your experience with this project?" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-2 fw-bold text-uppercase rounded-1">Post Review</button>
                            </form>
                        </div>
                        @endif
                    @else
                        <div class="p-4 border rounded-3 bg-light text-center">
                            <p class="small text-muted mb-3">Please log in to share your feedback on this project.</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm fw-bold px-4 rounded-1">Login</a>
                        </div>
                    @endauth
                </div>

                <div class="col-lg-8">
                    <div class="ps-lg-4 mt-4 mt-lg-5">
                        @forelse($reviews as $review)
                            <div class="d-flex gap-3 mb-4 pb-4 border-bottom last-child-border-0">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="fw-bold mb-0 small">{{ $review->user->name ?? 'Guest' }}</h6>
                                        <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div class="text-warning small mb-2">
                                        @for($i=0; $i < 5; $i++)
                                            <i class="bi bi-star{{ $i < $review->rating ? '-fill' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="text-muted small mb-0">{{ $review->message }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 bg-light rounded-3 text-center">
                                <p class="text-muted mb-0">No reviews yet. Be the first to review this project.</p>
                            </div>
                        @endforelse
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
                    <div class="col-xl-4 col-md-6">
                        <article class="all-project-card h-100">
                            <a href="{{ route('panel.pages.project-details', $similarProject) }}" class="all-project-image d-block">
                                <img src="{{ $similarProject->imageUrl() }}" alt="{{ $similarProject->title }}" class="img-fluid">
                            </a>

                            <div class="all-project-body">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                    <span class="project-chip">{{ $similarProject->category }}</span>
                                    <span class="project-price {{ $similarProject->status === 'free' ? 'text-success' : 'text-dark' }}">{{ $similarProject->priceLabel() }}</span>
                                </div>

                                <h3>
                                    <a href="{{ route('panel.pages.project-details', $similarProject) }}">{{ $similarProject->title }}</a>
                                </h3>

                                <p>{{ \Illuminate\Support\Str::limit($similarProject->one_line_description ?: ($similarProject->description ?? 'No description added yet.'), 95) }}</p>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-3">
                                    <span class="small text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <span class="text-muted">{{ number_format((float) $similarProject->rating, 1) }}</span>
                                    </span>

                                    @if ($similarProject->language)
                                        <span class="small text-muted">{{ $similarProject->language }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating-input i');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const val = this.getAttribute('data-value');

            if (ratingValue) {
                ratingValue.value = val;
            }

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

    .all-project-card {
        background: var(--surface-color);
        border: 1px solid color-mix(in srgb, var(--default-color), transparent 88%);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .all-project-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.1);
    }

    .all-project-image {
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: #eef0f2;
    }

    .all-project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    .all-project-card:hover .all-project-image img {
        transform: scale(1.04);
    }

    .all-project-body {
        padding: 20px;
    }

    .all-project-body h3 {
        font-size: 1.18rem;
        font-weight: 800;
        line-height: 1.3;
        margin: 0 0 8px;
    }

    .all-project-body h3 a {
        color: var(--heading-color);
        text-decoration: none;
    }

    .all-project-body h3 a:hover {
        color: var(--accent-color);
    }

    .all-project-body p {
        color: color-mix(in srgb, var(--default-color), transparent 25%);
        margin: 0;
    }

    .project-chip {
        background: color-mix(in srgb, var(--accent-color), transparent 88%);
        border-radius: 6px;
        color: var(--accent-color);
        font-size: 0.78rem;
        font-weight: 800;
        padding: 6px 10px;
    }

    .project-price {
        font-weight: 800;
        white-space: nowrap;
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

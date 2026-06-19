<section id="featured_projects" class="services section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Projects</h2>
    <p>Featured Projects<br></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    @if (($featuredProjects ?? collect())->count())
      <div class="row gy-5">
        @foreach ($featuredProjects as $project)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
            <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">
              <div class="img h-100 w-100">
                <img src="{{ $project->imageUrl() }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $project->title }}">
              </div>

              @if ($project->language)
                <div class="project-language-bar position-absolute rounded-3 text-center">{{ $project->language }}</div>
              @endif

              <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center"
                   style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="d-flex align-items-center gap-1 text-warning small">
                    <i class="bi bi-star-fill"></i>
                    <span class="text-dark fw-bold">{{ number_format((float) $project->rating, 1) }}</span>
                  </div>

                  <span class="fw-bold {{ $project->status === 'free' ? 'text-success' : 'text-dark' }}">{{ $project->priceLabel() }}</span>
                </div>

                <a href="{{ route('panel.pages.project-details', $project) }}" class="stretched-link text-decoration-none">
                  <h3 class="fs-4 fw-bold text-dark mb-0">{{ $project->title }}</h3>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="text-center py-5">
        <i class="bi bi-stars display-4 text-muted"></i>
        <h3 class="mt-3">No featured projects yet</h3>
        <p class="text-muted">Projects submitted from the form will appear here automatically.</p>
      </div>
    @endif
  </div>
</section>

<style>
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

  .section-title {
    padding-bottom: 60px;
    position: relative;
  }

  .project-language-bar {
    bottom: 88px;
    left: 4%;
    width: 32%;
    background: rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.28);
    color: #111;
    font-size: 0.82rem;
    font-weight: 800;
    letter-spacing: 0;
    padding: 6px 12px;
    z-index: 2;
  }
</style>

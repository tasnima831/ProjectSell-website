<section id="featured_projects" class="services section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Projects</h2>
    <p>Featured Projects<br></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    @if (($featuredProjects ?? collect())->count())
      <div class="row gy-4">
        @foreach ($featuredProjects as $project)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
            <article class="all-project-card h-100">
              <a href="{{ route('panel.pages.project-details', $project) }}" class="all-project-image d-block">
                <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" class="img-fluid">
              </a>

              <div class="all-project-body">
                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                  <span class="project-chip">{{ $project->category }}</span>
                  <span class="project-price {{ $project->status === 'free' ? 'text-success' : 'text-dark' }}">{{ $project->priceLabel() }}</span>
                </div>

                <h3>
                  <a href="{{ route('panel.pages.project-details', $project) }}">{{ $project->title }}</a>
                </h3>

                <p>{{ \Illuminate\Support\Str::limit($project->one_line_description ?: ($project->description ?? 'No description added yet.'), 95) }}</p>

                <div class="d-flex justify-content-between align-items-center gap-3 mt-3">
                  <span class="small text-warning">
                    <i class="bi bi-star-fill"></i>
                    <span class="text-muted">{{ number_format((float) $project->rating, 1) }}</span>
                  </span>

                  @if ($project->language)
                    <span class="small text-muted">{{ $project->language }}</span>
                  @endif
                </div>
              </div>
            </article>
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
</style>

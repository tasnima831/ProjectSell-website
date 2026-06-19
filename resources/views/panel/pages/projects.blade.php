<section id="projects" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Projects</h2>
    <p>BEST PROJECTS</p>
  </div>

  <div class="container">
    @auth
      <a class="cta-btn mb-4" href="{{ route('panel.pages.add-project-form') }}">Add New Project</a>
    @endauth

    <div class="text-right mt-5">
      <a class="cta-btn" style="color: #000000; border: 3px solid #db3939; text-decoration: none" href="{{ route('panel.pages.projects.index') }}">All Projects</a>
    </div>

    @if (($homeProjects ?? collect())->count())
      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-product">Website</li>
          <li data-filter=".filter-branding">Theme</li>
          <li data-filter=".filter-books">UI UX</li>
        </ul>

        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($homeProjects as $project)
            @php
              $filterClass = match ($project->category) {
                  'Website' => 'filter-product',
                  'Theme' => 'filter-branding',
                  'UI UX' => 'filter-books',
                  default => 'filter-app',
              };
            @endphp

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $filterClass }}">
              <div class="portfolio-content h-100">
                <img src="{{ $project->imageUrl() }}" class="img-fluid" alt="{{ $project->title }}">
                <div class="portfolio-info">
                  <h4>{{ $project->category }}</h4>
                  <h3 class="fw-bold mb-4" style="color:white">{{ $project->title }}</h3>
                  <p>{{ \Illuminate\Support\Str::limit($project->one_line_description ?: ($project->description ?? 'No description added yet.'), 90) }}</p>
                  <a href="{{ $project->imageUrl() }}" title="{{ $project->title }}" data-gallery="portfolio-gallery-{{ $project->id }}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details', $project) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @else
      <div class="text-center py-5">
        <i class="bi bi-folder2-open display-4 text-muted"></i>
        <h3 class="mt-3">No projects added yet</h3>
        <p class="text-muted">Submit the add project form and your projects will appear here.</p>
      </div>
    @endif
  </div>
</section>

@extends('panel.layout')

@section('content')
    <section id="all-projects" class="all-projects section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Projects</h2>
            <p>All Projects</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ route('panel.pages.projects.index') }}" method="GET" class="all-projects-toolbar mb-5">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Project name" value="{{ request('search') }}">
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="status" class="form-label">Price</label>
                        <select id="status" name="status" class="form-select">
                            <option value="">All Prices</option>
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="language" class="form-label">Language</label>
                        <select id="language" name="language" class="form-select">
                            <option value="">All Languages</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language }}" @selected(request('language') === $language)>{{ $language }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="sort" class="form-label">Sort</label>
                        <select id="sort" name="sort" class="form-select">
                            @foreach ($sortOptions as $value => $label)
                                <option value="{{ $value }}" @selected(request('sort', 'latest') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-1 col-md-6 d-flex gap-2">
                        <button type="submit" class="btn btn-get-started w-100" aria-label="Apply filters">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>

                @if (request()->hasAny(['search', 'category', 'status', 'language', 'sort']))
                    <div class="mt-3">
                        <a href="{{ route('panel.pages.projects.index') }}" class="small text-decoration-none">Clear filters</a>
                    </div>
                @endif
            </form>

            <div class="d-flex justify-content-between align-items-center gap-3 mb-4 flex-wrap">
                <p class="mb-0 text-muted">
                    Showing {{ $projects->firstItem() ?? 0 }}-{{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} projects
                </p>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a class="cta-btn" href="{{ route('panel.pages.add-project-form') }}">Add New Project</a>
                    @endif
                @endauth
            </div>

            @if ($projects->count())
                <div class="row gy-4">
                    @foreach ($projects as $project)
                        <div class="col-xl-4 col-md-6">
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

                <div class="mt-5 d-flex justify-content-center">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="all-projects-empty text-center py-5">
                    <i class="bi bi-folder2-open"></i>
                    <h3 class="mt-3">No projects found</h3>
                    <p class="text-muted mb-4">Try changing the filters or search text.</p>
                    <a href="{{ route('panel.pages.projects.index') }}" class="cta-btn">View All Projects</a>
                </div>
            @endif
        </div>
    </section>

    <style>
        .all-projects-toolbar {
            background: #f8f9fa;
            border: 1px solid color-mix(in srgb, var(--default-color), transparent 88%);
            border-radius: 8px;
            padding: 24px;
        }

        .all-projects-toolbar .form-label {
            color: var(--heading-color);
            font-size: 0.86rem;
            font-weight: 700;
        }

        .all-projects-toolbar .form-control,
        .all-projects-toolbar .form-select {
            min-height: 44px;
            border-radius: 6px;
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

        .all-projects-empty {
            background: #f8f9fa;
            border: 1px solid color-mix(in srgb, var(--default-color), transparent 88%);
            border-radius: 8px;
        }

        .all-projects-empty i {
            color: var(--accent-color);
            font-size: 3rem;
        }
    </style>
@endsection

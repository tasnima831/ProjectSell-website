@extends('panel.layout')
@section('content')

<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Main Video Area -->
        <div class="col-lg-8 col-xl-9">
            <div class="bg-black rounded-4 overflow-hidden shadow-lg mb-4">
                <div class="ratio ratio-16x9">
                    {{-- Placeholder for a video iframe or player --}}
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0" title="Lesson Video" allowfullscreen></iframe>
                </div>
            </div>

            <div class="bg-white p-4 rounded-4 shadow-sm">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h3 class="fw-bold mb-0">Lesson 1: Introduction to the Technical Stack</h3>
                    <button class="btn btn-light rounded-pill px-4"><i class="bi bi-heart me-2"></i>Save</button>
                </div>
                <div class="d-flex align-items-center gap-4 text-muted small mb-4">
                    <span><i class="bi bi-calendar3 me-2"></i>Updated Dec 2023</span>
                    <span><i class="bi bi-clock me-2"></i>12:45 Mins</span>
                    <span><i class="bi bi-hand-thumbs-up me-2"></i>4.8 Rating</span>
                </div>
                <hr>
                <h6 class="fw-bold mb-2">About this lesson</h6>
                <p class="text-muted" style="line-height: 1.6;">
                    In this introductory module, we walk through the architecture of the Car Rent project. You'll learn how Laravel handles the routing, how the frontend assets are organized via Bootstrap, and how to set up your local development environment.
                </p>
            </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px;">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Course Content</h5>
                    <span class="badge bg-dark rounded-pill">12 Lessons</span>
                </div>
                <div class="list-group list-group-flush overflow-auto" style="max-height: calc(100vh - 250px);">
                    @php
                        $lessons = [
                            ['title' => 'Introduction to Stack', 'time' => '12:45', 'active' => true],
                            ['title' => 'Database Schema Setup', 'time' => '18:20', 'active' => false],
                            ['title' => 'Authentication Controllers', 'time' => '25:10', 'active' => false],
                            ['title' => 'Building the Sidebar', 'time' => '15:05', 'active' => false],
                            ['title' => 'Dynamic Table Logic', 'time' => '32:40', 'active' => false],
                            ['title' => 'Form Validation API', 'time' => '22:15', 'active' => false],
                            ['title' => 'Final Deployment', 'time' => '10:50', 'active' => false],
                        ];
                    @endphp

                    @foreach($lessons as $index => $item)
                        <a href="#" class="list-group-item list-group-item-action py-3 border-0 {{ $item['active'] ? 'bg-light' : '' }}">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 {{ $item['active'] ? 'bg-primary text-white' : 'bg-light text-muted' }}" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                    @if($item['active'])
                                        <i class="bi bi-play-fill"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mb-0 text-truncate small fw-bold {{ $item['active'] ? 'text-primary' : '' }}">{{ $item['title'] }}</h6>
                                    <span class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock me-1"></i> {{ $item['time'] }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
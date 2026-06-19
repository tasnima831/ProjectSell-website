@extends('panel.layout')

@section('content')
@php
    $videos = $project->videos;
    $activeVideo = $videos[$activeLesson - 1];
@endphp

<div class="container-fluid py-4">
    @if (session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-lg-8 col-xl-9">
            <div class="bg-black rounded-4 overflow-hidden shadow-lg mb-4">
                <div class="ratio ratio-16x9">
                    <video src="{{ asset('storage/' . $activeVideo->path) }}" controls class="w-100 h-100" style="object-fit: contain;" title="{{ $activeVideo->title ?: $project->title }}"></video>
                </div>
            </div>

            <div class="bg-white p-4 rounded-4 shadow-sm">
                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                    <div>
                        <span class="small text-muted">{{ $project->title }}</span>
                        <h3 class="fw-bold mb-0">{{ $activeVideo->title ?: 'Video ' . $activeLesson }}</h3>
                    </div>

                    <a href="{{ route('panel.pages.project-details', $project) }}" class="btn btn-light rounded-pill px-4">
                        <i class="bi bi-arrow-left me-2"></i>Project
                    </a>
                </div>
                <div class="d-flex align-items-center gap-4 text-muted small mb-4 flex-wrap">
                    <span><i class="bi bi-camera-video me-2"></i>Video {{ $activeLesson }} of {{ $videos->count() }}</span>
                    <span><i class="bi bi-hand-thumbs-up me-2"></i>{{ number_format($project->ratingValue(), 1) }} Rating</span>
                    <span><i class="bi bi-tag me-2"></i>{{ $hasProjectAccess ? 'Full Access' : 'Preview Access' }}</span>
                </div>
                <hr>
                <h6 class="fw-bold mb-2">About this video</h6>
                <p class="text-muted mb-0" style="line-height: 1.6;">
                    This video was uploaded by the project creator. Paid projects unlock every uploaded video after billing is completed.
                </p>
            </div>
        </div>

        <div class="col-lg-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px;">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Project Videos</h5>
                    <span class="badge bg-dark rounded-pill">{{ $videos->count() }}</span>
                </div>
                <div class="list-group list-group-flush overflow-auto" style="max-height: calc(100vh - 250px);">
                    @foreach($videos as $index => $video)
                        @php
                            $videoNumber = $index + 1;
                            $isActive = $videoNumber === $activeLesson;
                            $isLocked = ! $hasProjectAccess && $videoNumber > 1;
                        @endphp

                        @if ($isLocked)
                            <a href="{{ route('panel.pages.bill', $project) }}" class="list-group-item list-group-item-action py-3 border-0">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 bg-light text-muted" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                        <i class="bi bi-lock-fill"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h6 class="mb-0 text-truncate small fw-bold">{{ $video->title ?: 'Video ' . $videoNumber }}</h6>
                                        <span class="text-muted" style="font-size: 0.75rem;">Unlock after billing</span>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('panel.pages.videos', ['project' => $project, 'lesson' => $videoNumber]) }}" class="list-group-item list-group-item-action py-3 border-0 {{ $isActive ? 'bg-light' : '' }}">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 {{ $isActive ? 'bg-primary text-white' : 'bg-light text-muted' }}" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                        @if($isActive)
                                            <i class="bi bi-play-fill"></i>
                                        @else
                                            {{ $videoNumber }}
                                        @endif
                                    </div>
                                    <div class="overflow-hidden">
                                        <h6 class="mb-0 text-truncate small fw-bold {{ $isActive ? 'text-primary' : '' }}">{{ $video->title ?: 'Video ' . $videoNumber }}</h6>
                                        <span class="text-muted" style="font-size: 0.75rem;">{{ $videoNumber === 1 && ! $hasProjectAccess ? 'Free preview' : 'Available' }}</span>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>

                @if (! $hasProjectAccess)
                    <div class="card-footer bg-white border-top p-3">
                        <a href="{{ route('panel.pages.bill', $project) }}" class="btn btn-dark w-100 fw-bold">Unlock All Videos</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

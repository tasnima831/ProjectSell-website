@extends('panel.layout')

@section('content')
    <section id="add-project" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Add New Project</h2>
            <p>Fill out the form below to add a new project.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('panel.pages.projects.store') }}" method="post" enctype="multipart/form-data" class="php-email-form">
                        @csrf

                        <div class="row gy-4">
                            <div class="col-md-12">
                                <input type="text" name="title" class="form-control" placeholder="Project Title" required value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 ">
                                <textarea class="form-control" name="description" rows="6" placeholder="Project Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Project Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="App" {{ old('category') == 'App' ? 'selected' : '' }}>App</option>
                                    <option value="Website" {{ old('category') == 'Website' ? 'selected' : '' }}>Website</option>
                                    <option value="Theme" {{ old('category') == 'Theme' ? 'selected' : '' }}>Theme</option>
                                    <option value="UI UX" {{ old('category') == 'UI UX' ? 'selected' : '' }}>UI UX</option>
                                </select>
                                @error('category')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="free" {{ old('status') == 'free' ? 'selected' : '' }}>Free</option>
                                    <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">Price (for Paid projects)</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price', 0.00) }}">
                                @error('price')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="rating" class="form-label">Rating (0.0 - 5.0)</label>
                                <input type="number" name="rating" id="rating" class="form-control" step="0.1" min="0" max="5" value="{{ old('rating', 0.0) }}">
                                @error('rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your project has been added. Thank you!</div>

                                <button type="submit">Add Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


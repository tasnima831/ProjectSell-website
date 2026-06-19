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
                                <label for="title" class="form-label">Project Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Project Title" required value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="one_line_description" class="form-control" placeholder="One-Line Description" value="{{ old('one_line_description') }}">
                                @error('one_line_description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 ">
                                <label for="tech_used" class="form-label">Technical Stack</label>
                                <textarea class="form-control" name="tech_used" rows="6" placeholder="Technical Stack">{{ old('tech_used') }}</textarea>
                                @error('tech_used')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 ">
                                <label for="description" class="form-label">Project Description</label>
                                <textarea class="form-control" name="description" rows="6" placeholder="Project Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Project Images</label>
                                <input type="file" name="images[]" id="image" class="form-control" accept="image/*" multiple>
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                @error('images')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="project_file" class="form-label">Project File</label>
                                <input type="file" name="project_file" id="project_file" class="form-control">
                                @error('project_file')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="project_link" class="form-label">Project Link</label>
                                <input type="url" name="project_link" id="project_link" class="form-control" placeholder="https://example.com" value="{{ old('project_link') }}">
                                @error('project_link')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="creator_name" class="form-label">Created By Name</label>
                                <input type="text" name="creator_name" id="creator_name" class="form-control" placeholder="Creator name" value="{{ old('creator_name') }}">
                                @error('creator_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company or organization name" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="creator_profile_pic" class="form-label">Creator Profile Picture</label>
                                <input type="file" name="creator_profile_pic" id="creator_profile_pic" class="form-control" accept="image/*">
                                @error('creator_profile_pic')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="" selected disabled>Select Category</option>
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
                                <label for="language" class="form-label">Language</label>
                                <select name="language" id="language" class="form-select">
                                    <option value="">Select Language</option>
                                    <option value="PHP" {{ old('language') == 'PHP' ? 'selected' : '' }}>PHP</option>
                                    <option value="Python" {{ old('language') == 'Python' ? 'selected' : '' }}>Python</option>
                                    <option value="JavaScript" {{ old('language') == 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                                    <option value="Laravel" {{ old('language') == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                                </select>
                                @error('language')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">Price (for Paid projects)</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price') }}">
                                @error('price')
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

    <style>
    select.form-select:hover {
        border-color: red;
        box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.15);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusSelect = document.getElementById('status');
        const priceInput = document.getElementById('price');

        function updatePriceField() {
            const isPaid = statusSelect.value === 'paid';

            priceInput.disabled = !isPaid;
            priceInput.required = isPaid;
            priceInput.placeholder = isPaid ? 'Enter project price' : 'Not needed for free projects';

            if (!isPaid) {
                priceInput.value = '';
            }
        }

        statusSelect.addEventListener('change', updatePriceField);
        updatePriceField();
    });
</script>
@endsection

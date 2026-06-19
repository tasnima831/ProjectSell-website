<section id="projects" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
        <p>BEST PROJECTS</p>
      </div>

      <div class="container">
        @auth
            @if(auth()->user()->role === 'admin')
                <a class="cta-btn mb-4" href="{{ route('panel.pages.add-project-form') }}">Add New Project</a>
            @endif
        @endauth
        <div class="text-right mt-5">
          <a class="cta-btn" style="color: #000000; border: 3px solid #db3939; text-decoration: bold" href="{{ route('panel.pages.projects.index') }}">All Projects</a>
        </div>

        <!-- Portfolio Gallery -->

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Website</li>
            <li data-filter=".filter-branding">Theme</li>
            <li data-filter=".filter-books">UI UX</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App</h4>
                  <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>
                  <p>description</p>
                  <a href="{{ asset('assets/img/portfolio/app-1.jpg') }}" title="App" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/736x/05/46/46/05464693268fd1a5c3f82dc7c27c7467.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Website</h4>
                  <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>
                 
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/736x/05/46/46/05464693268fd1a5c3f82dc7c27c7467.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/8c/d3/2d/8cd32dbf8300576be9b0fa12ef448292.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Theme</h4>
                  <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/8c/d3/2d/8cd32dbf8300576be9b0fa12ef448292.jpg" title="Theme" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/01/21/14/012114563a2f98009b9137e0db680353.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>UI UX</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/01/21/14/012114563a2f98009b9137e0db680353.jpg" title="UI UX" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="{{ asset('assets/img/portfolio/app-2.jpg') }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="{{ asset('assets/img/portfolio/app-2.jpg') }}" title="App" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/6b/50/a1/6b50a1fa8d106a36e8b82a67f7dcb769.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Website</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/6b/50/a1/6b50a1fa8d106a36e8b82a67f7dcb769.jpg" title="Website" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/736x/bb/c1/0c/bbc10cae8a1d69785897bb3318181d2e.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Theme</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/736x/bb/c1/0c/bbc10cae8a1d69785897bb3318181d2e.jpg" title="Theme" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/38/7a/d5/387ad5b3bd1652acbdf5a5b0749deff2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>UI UX</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/38/7a/d5/387ad5b3bd1652acbdf5a5b0749deff2.jpg" title="UI UX" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/736x/47/f8/e2/47f8e26c1bc6380cfad136b59b4ba524.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/736x/47/f8/e2/47f8e26c1bc6380cfad136b59b4ba524.jpg" title="App" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/ea/17/65/ea176500ae2d4d31e8a8669842b186df.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Website</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/ea/17/65/ea176500ae2d4d31e8a8669842b186df.jpg" title="Website" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/736x/52/60/03/526003a8c65cdfcef2d616d42012fcfd.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Theme</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/736x/52/60/03/526003a8c65cdfcef2d616d42012fcfd.jpg" title="Theme" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="https://i.pinimg.com/1200x/0e/26/4f/0e264f2644cd334446204667035034ed.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>UI UX</h4>
                                    <h3 class="fw-bold mb-5" style="color:white">Accounting Management System</h3>

                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="https://i.pinimg.com/1200x/0e/26/4f/0e264f2644cd334446204667035034ed.jpg" title="UI UX" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="{{ route('panel.pages.project-details') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>
      </div>
    </div>

    </section>

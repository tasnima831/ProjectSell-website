<section id="projects" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Projects</h2>
    <p>Featured Projects<br></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <!-- Project 1 -->
      <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">

          <div class="img h-100 w-100">
            <img src="{{ asset('assets/img/noteapp.png') }}"
                 class="img-fluid w-100 h-100 object-fit-cover"
                 alt="">
          </div>

          <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center"
               style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">

            <div class="d-flex justify-content-between align-items-center mb-1">

              <div class="d-flex align-items-center gap-1 text-warning small">
                <i class="bi bi-star-fill"></i>
                <span class="text-dark fw-bold">4.8</span>
                <span class="text-muted small">(120)</span>
              </div>

              <span class="fw-bold text-success">Free</span>
            </div>

            <a href="{{ route('panel.pages.project-details') }}" class="stretched-link text-decoration-none">
              <h3 class="fs-6 fw-bold text-dark mb-0">NoteQuest</h3>
            </a>

          </div>
        </div>
      </div>

      <!-- Project 2 -->
      <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">

          <div class="img h-100 w-100">
            <img src="{{ asset('assets/img/services-2.jpg') }}"
                 class="img-fluid w-100 h-100 object-fit-cover"
                 alt="">
          </div>

          <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center"
               style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">

            <div class="d-flex justify-content-between align-items-center mb-1">

              <div class="d-flex align-items-center gap-1 text-warning small">
                <i class="bi bi-star-fill"></i>
                <span class="text-dark fw-bold">4.5</span>
                <span class="text-muted small">(80)</span>
              </div>

              <span class="fw-bold text-dark">$10</span>
            </div>

            <a href="{{ route('panel.pages.project-details') }}" class="stretched-link text-decoration-none">
              <h3 class="fs-6 fw-bold text-dark mb-0">Eosle Commodi</h3>
            </a>

          </div>
        </div>
      </div>

      <!-- Project 3 -->
      <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="service-item shadow-sm p-0 overflow-hidden border-0 rounded-4 project-card position-relative" style="height: 320px;">

          <div class="img h-100 w-100">
            <img src="{{ asset('assets/img/services-3.jpg') }}"
                 class="img-fluid w-100 h-100 object-fit-cover"
                 alt="">
          </div>

          <div class="details p-2 position-absolute bottom-0 start-50 translate-middle-x mb-2 rounded-3 text-center"
               style="width: 92%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">

            <div class="d-flex justify-content-between align-items-center mb-1">

              <div class="d-flex align-items-center gap-1 text-warning small">
                <i class="bi bi-star-fill"></i>
                <span class="text-dark fw-bold">4.2</span>
                <span class="text-muted small">(50)</span>
              </div>

              <span class="fw-bold text-dark">$15</span>
            </div>

            <a href="{{ route('panel.pages.project-details') }}" class="stretched-link text-decoration-none">
              <h3 class="fs-6 fw-bold text-dark mb-0">Ledo Markt</h3>
            </a>

          </div>
        </div>
      </div>

    </div>

  </div>

</section>
<style>
  .services .details {
    background: 
 color-mix(in srgb, var(--surface-color), transparent 5%);
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
</style>
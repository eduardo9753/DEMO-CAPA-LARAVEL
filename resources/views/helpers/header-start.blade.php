  <!-- App header starts -->
  <div class="app-header d-flex align-items-center">

      <!-- Container starts -->
      <div class="container">

          <!-- Row starts -->
          <div class="row">
              <div class="col-md-3 col-2">

                  <!-- App brand starts -->
                  <div class="app-brand">
                      <a href="#" class="d-lg-block d-none">
                          <img src="{{ asset('img/logo.png') }}" class="logo" alt="Bootstrap Gallery" />
                      </a>
                      <a href="#" class="d-lg-none d-md-block">
                          <img src="{{ asset('img/logo.png') }}" class="logo" alt="Bootstrap Gallery" />
                      </a>
                  </div>
                  <!-- App brand ends -->

              </div>

              <div class="col-md-9 col-10">
                  <!-- App header actions start -->
                  <div class="header-actions d-flex align-items-center justify-content-end">

                      <!-- Search container start -->
                      <div class="search-container d-none d-lg-block">
                          <input type="text" class="form-control" placeholder="Search" />
                          <i class="icon-search"></i>
                      </div>
                      <!-- Search container end -->


                      <div class="dropdown ms-2">
                          <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!"
                              role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="d-none d-md-block">{{ auth()->user()->name }}</span>
                              <img src="https://cdn-icons-png.flaticon.com/512/3126/3126589.png"
                                  class="img-3x m-2 me-0 rounded-5" alt="Bootstrap Gallery" />
                          </a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3" style="">
                              <form action="{{ route('logout') }}" class="dropdown-item d-flex align-items-center py-2"
                                  method="POST">
                                  @csrf
                                  <button class="btn btn-outline-danger w-100" type="submit"><i
                                          class="icon-log-out fs-4 me-3"></i>Salir</button>
                              </form>
                          </div>
                      </div>

                      <!-- Toggle Menu starts -->
                      <button class="btn btn-success btn-sm ms-3 d-lg-none d-md-block" type="button"
                          data-bs-toggle="offcanvas" data-bs-target="#MobileMenu">
                          <i class="icon-menu"></i>
                      </button>
                      <!-- Toggle Menu ends -->

                  </div>
                  <!-- App header actions end -->

              </div>
          </div>
          <!-- Row ends -->

      </div>
      <!-- Container ends -->

  </div>
  <!-- App header ends -->

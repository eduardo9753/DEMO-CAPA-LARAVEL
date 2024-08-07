@extends('layouts.app')


@section('body')

    <body>

        <!-- Page wrapper start -->
        <div class="page-wrapper">

            <!-- App container starts -->
            <div class="app-container">

                <!-- App header starts -->
                @include('helpers.header-start')
                <!--App header ends-->

                <!-- App navbar starts -->
                @include('template.nav-medico')
                <!-- App Navbar ends -->

                <!-- App body starts -->
                <div class="app-body">

                    <!-- Container starts -->
                    <div class="container">

                        <!-- Row start -->
                        <div class="row">
                            <div class="col-12 col-xl-6">

                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb mb-3">
                                    <li class="breadcrumb-item">
                                        <i class="icon-house_siding lh-1"></i>
                                        <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Dashboards</li>
                                    <li class="breadcrumb-item text-light">Courses</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <div>
                                <a class="boton-redondo mb-3" href=""><i class='bx bx-refresh bx-spin'></i></a>
                            </div>
                            @foreach ($courses as $course)
                                <div class="col-sm-4 col-12">
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <h4 class="card-title text-primary mb-2">{{ $course->title }}</h4>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $course->subtitle }}
                                            </h6>
                                        </div>
                                        <img src="https://cdn.pixabay.com/photo/2021/12/27/19/28/e-commerce-6898102_1280.png"
                                            class="img-fluid" alt="Bootstrap Gallery" />
                                        <div class="card-body position-relative pt-4">
                                            @can('enrolled', $course)
                                                <a href="{{ route('room.index', ['course' => $course]) }}"
                                                    class="btn btn-primary card-btn-floating">
                                                    <i class='bx bxs-right-arrow'></i>
                                                </a>
                                            @else
                                                <a href="{{ route('room.enrolled', ['course' => $course]) }}"
                                                    class="btn btn-primary card-btn-floating">
                                                    <i class='bx bx-left-indent'></i>
                                                </a>
                                            @endcan

                                            {{-- BARRA DE PROGRESO --}}
                                            <div class="progress" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="{{ $course->advance($course) }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar" style="width: {{ $course->advance($course) }}%">
                                                    {{ $course->advance($course) }} %</div>
                                            </div>
                                            {{-- BARRA DE PROGRESO --}}
                                        </div>
                                        <div class="card-footer d-flex justify-content-between align-items-center">
                                            @if ($course->signatures->isNotEmpty())
                                                <a href="{{ route('dashboard.show', ['course' => $course]) }}"
                                                    class="btn btn-outline-warning">Firmado</a>
                                            @else
                                                <a href="{{ route('dashboard.show', ['course' => $course]) }}"
                                                    class="btn btn-outline-danger">Firmar</a>
                                            @endif


                                            @can('enrolled', $course)
                                                <a href="{{ route('room.index', ['course' => $course]) }}"
                                                    class="btn btn-outline-primary">
                                                    continuar
                                                </a>
                                            @else
                                                <a href="{{ route('room.enrolled', ['course' => $course]) }}"
                                                    class="btn btn-outline-primary">
                                                    tomar curso
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Row end -->

                    </div>
                    <!-- Container ends -->

                </div>
                <!-- App body ends -->

                <!-- App footer start -->
                <div class="app-footer">
                    <div class="container">
                        <span>© HCE - CAPA @php
                            echo date('Y');
                        @endphp </span>
                    </div>
                </div>
                <!-- App footer end -->

            </div>
            <!-- App container ends -->

        </div>
        <!-- Page wrapper end -->
    </body>
@endsection

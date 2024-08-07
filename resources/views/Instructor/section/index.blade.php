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
                @include('template.nav-admin')
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
                                    <li class="breadcrumb-item">Secciones</li>
                                    <li class="breadcrumb-item text-light">Secciones del Curso</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            {{-- COMPONENTE LIVEWIRE --}}
                            @livewire('instructor.sections', ['course' => $course], key($course->id))

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
        </div>
        <!-- Page wrapper end -->


    </body>
@endsection

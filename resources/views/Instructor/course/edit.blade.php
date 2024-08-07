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
                                    <li class="breadcrumb-item">Cursos</li>
                                    <li class="breadcrumb-item text-light">Crear Curso</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <h1 class="lead">Información del Curso</h1>
                            <div class="col-md-4">
                                {{-- LLAMADA DEL COMPONENTE ASIDE --}}
                                @component('components.instructor.aside')
                                    {{-- Puedes pasar datos al componente si es necesario --}}
                                    @slot('course', $course)
                                @endcomponent
                            </div>

                            <div class="col-md-8">
                                <div class="card sombra">
                                    <div class="card-header fondo-general">
                                        <h2 class="lead text-white">información del curso</h2>
                                    </div>
                                    <div class="card-body">
                                        {!! Form::model($course, [
                                            'route' => ['instructor.course.update', $course],
                                            'method' => 'put',
                                            'files' => true,
                                        ]) !!}

                                        @include('instructor.course.partials.form')

                                        <div class="mt-2">
                                            {!! Form::submit('Actualizar Información', ['class' => 'btn btn-success w-100']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

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
            <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
            <script src="{{ asset('js/instructor/ckeditor.js') }}"></script>
        </div>
        <!-- Page wrapper end -->


    </body>
@endsection

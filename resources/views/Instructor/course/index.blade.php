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
                                    <li class="breadcrumb-item text-light">Lista de Cursos</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <div class="card sombra">
                                <div class="card-header fondo-general">
                                    <a class="btn btn-success" href="{{ route('instructor.course.create') }}">Crear Nuevo
                                        Curso</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOMBRE</th>
                                                <th>DESCRIPCION</th>
                                                <th>STATUS</th>
                                                <th>EDITAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td>{{ $course->id }}</td>
                                                    <td>{{ $course->title }}</td>
                                                    <td>{{ $course->subtitle }}</td>
                                                    <td>
                                                        @switch($course->status)
                                                            @case('activo')
                                                                <p>PUBLICADO</p>
                                                            @break

                                                            @default
                                                                <p>DESARROLLO</p>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="{{ route('instructor.course.edit', ['course' => $course]) }}">editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

        </div>
        <!-- Page wrapper end -->


    </body>
@endsection

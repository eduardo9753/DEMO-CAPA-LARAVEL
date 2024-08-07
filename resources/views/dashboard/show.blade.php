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
                                    <li class="breadcrumb-item text-light">Firmar Curso</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <div class="col-sm-4 col-12">
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title text-primary mb-2">{{ $course->title }}</h4>
                                        <h6 class="card-subtitle text-muted">{{ $course->subtitle }} ({{ $course->id }})
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
                                        <p>{{ $course->description }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        @can('enrolled', $course)
                                            <a href="{{ route('room.index', ['course' => $course]) }}"
                                                class="btn btn-outline-primary">continuar</a>
                                        @else
                                            <a href="{{ route('room.enrolled', ['course' => $course]) }}"
                                                class="btn btn-outline-primary">tomar curso</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-12">
                                <div class="card">
                                    <div class="card-body">

                                        @if ($course->signatures->isNotEmpty())
                                            <div class="card-body table-responsive">
                                                <table class="table" id="datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>CURSO</th>
                                                            <th>FIRMA</th>
                                                            <th>FECHA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($course->signatures as $signature)
                                                            <tr>
                                                                <td>{{ $signature->id }}</td>
                                                                <td>{{ $signature->course->title }}</td>
                                                                <td>
                                                                    <img style="width: 85px;height: 65px;"
                                                                        src="{{ $signature->firma }}"
                                                                        alt="Firma de {{ $signature->user->name }}">
                                                                </td>
                                                                <td>{{ $signature->fecha_firma }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <button class="btn btn-success" id="limpiarFirma">Limpiar</button>
                                            <form action="{{ route('room.firmar') }}" id="frmAjaxFirma" method="POST"
                                                class="mt-2" enctype="application/x-www-form-urlencoded">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="signature-pad">Firma:</label>
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <div class="signature-container">
                                                        <canvas id="signature-pad" class="signature-pad"></canvas>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="signature" id="signature" />
                                                <input type="submit" class="btn btn-warning mt-1 w-100"
                                                    value="Firmar Reforzamiento">
                                            </form>
                                        @endif

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

        </div>
        <!-- Page wrapper end -->

        {{-- AJAX DE LA FIRMA CON EL MODAL DE HELPERS --}}
        <script src="{{ asset('js/firmar.js') }}"></script>
    </body>
@endsection

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
                                    <li class="breadcrumb-item">Chat</li>
                                    <li class="breadcrumb-item text-light">My Chat Bot</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <div class="col-sm-12 col-12">
                                <div id="chat-container">
                                    <!--DIALOGOS DEL CHAT-->
                                    <div id="chat-log"></div>
                                    <!--DIALOGOS DEL CHAT-->

                                    <!--FORMULARIO DE PREGUNTAS-->
                                    <form action="{{ route('chat.conversation') }}" id="chat-form" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="message" class="form-control" id="message"
                                                placeholder="Escriba tu pregunta aquí..." required>
                                        </div>
                                        <button type="submit" class="btn btn-warning mt-2 w-100">Enviar</button>
                                    </form>
                                    <!--FORMULARIO DE PREGUNTAS-->
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

        <script src="{{ asset('js/chat.js') }}"></script>
    </body>
@endsection

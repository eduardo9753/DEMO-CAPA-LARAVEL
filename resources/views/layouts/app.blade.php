<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CAPA HCE</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />

    {{-- JQUERY --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- ************************* Common Css Files *************************
    <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap/bootstrap-icons.css') }}" />-->


    <!-- Calendar CSS
    <link rel="stylesheet" href="{{ asset('assets/vendor/calendar/css/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/calendar/css/custom.css') }}" />-->

    <!-- Date Range CSS
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterange/daterange.css') }}" />-->

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/boton-actualizar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" />

    <!--CSS SWEEALERT2-->
    <link rel="stylesheet" href="{{ asset('lib/sweetalert2/sweetalert2.min.css') }}">

    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />

    <!-- Plyr JS -->
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Scrollbar CSS
    <link rel="stylesheet" href="{{ asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}" />-->
    <!-- ESTILOS LIVEWIRE-->
    @livewireStyles
</head>


@yield('body')
@yield('scripts')
<!-- SCRIPT LIVEWIRE-->
@livewireScripts
<!-- *************
           ************ JavaScript Files *************
          ************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- *************
           ************ Vendor Js Files *************
          ************* -->

<!-- Overlay Scroll JS
<script src="{{ asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>-->

<!-- Apex Charts -->
{{-- <script src="{{ asset('assets/vendor/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/ticketsData.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/avgTimeData.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/liveCallsData.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/agentsLiveData.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/newClosedData.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/home/ticketsPriorityData.js') }}"></script> --}}

<!-- Rating
<script src="{{ asset('assets/vendor/rating/raty.js') }}"></script>
<script src="{{ asset('assets/vendor/rating/raty-custom.js') }}"></script>-->

<!--JS SWEEALERT2-->
<script src="{{ asset('lib/sweetalert2/sweetalert2.min.js') }}"></script>

<!--JS FULL CALENDAR-->
<script src="{{ asset('lib/fullcalendar/dist/index.global.js') }}"></script>

<!--JS MOMENT-->
<script src="{{ asset('lib/moment/moment.js') }}"></script>

<!-- Custom JS files -->
<script src="{{ asset('assets/js/custom.js') }}"></script>


<!--CDN DE LA FIRMA-->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>


</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> {{-- Bootstrap --}} {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}} {{-- ModularAdmin css --}}
    <link rel="stylesheet" href="{{ asset('modular-admin/css/vendor.css') }}"> {{-- Theme --}}
    <link rel="stylesheet" href="{{ asset('modular-admin/css/app-orange.css') }}">
    <link rel="stylesheet" href="{{ asset('modular-admin/css/style.css') }}">
    <title>Pedidos Restaurant</title>
</head>

<body>
    @include('layout.header-menu')
    @yield('content')
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script>  --}}
    {{-- ModularAdmin js --}}
    <script src="{{ asset('modular-admin/js/vendor.js') }}"></script>
    <script src="{{ asset('modular-admin/js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.1/holder.min.js"></script>
    @yield('script')
</body>

</html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="...">
    <link rel="icon" type="image/png" sizes="32x32" href="...">
    <link rel="icon" type="image/png" sizes="96x96" href="...">
    <link rel="icon" type="image/png" sizes="192x192" href="...">
    {{--Apple--}}
    <link rel="apple-touch-icon" href="...">

    <link rel="manifest" href="...">

    <title>Gestor de Tarefas</title>
    <!-- CSS files -->
    @vite(['resources/sass/app.scss'])
</head>

<body class="layout-fluid">
<div class="page">
    <!-- Header -->
    <header class="bg-light py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="" alt="Logo" class="me-2">
            </a>

            <!-- User Icon -->
            <a href="#" class="text-decoration-none">
                <img src="https://via.placeholder.com/40" alt="User Icon" class="rounded-circle border">
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">@yield('pretitle')</div>
                        <h2 class="page-title">@yield('title')</h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            {{--Botões de açao da página--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Page Body--}}
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        {{--Footer--}}
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl"></div>
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col">
                    <p>&copy Beatriz Guerra, Tayara Cruz - ATEC - TPSICAS1123 - Todos os direitos reservados </p>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->

@vite(['resources/js/app.js'])
@stack('scripts')
</body>

</html>

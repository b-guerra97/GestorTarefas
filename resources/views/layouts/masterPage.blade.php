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
            <a href="#" class="navbar-brand">
                <img src="https://cdn-icons-png.flaticon.com/512/8019/8019152.png" alt="Logo" class="ms-4" style="width: 70px;">
                <h2 class="m-0">Gestor de Tarefas</h2>
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
            <div class="container">
                <div class="row text-center align-items-center flex-row-reverse">
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

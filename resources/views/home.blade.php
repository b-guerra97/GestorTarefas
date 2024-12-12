
@extends('layouts.masterPage')
@section('content')
    <div class="bg-light">
        <div class="container mt-5">

            <div class="row justify-content-center">
                <!-- Card de Registo -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center">Registo</h2>
                            <form action="/registo" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input name="name" type="text" class="form-control" placeholder="Nome">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn btn-primary w-100">Registar</button>
                            </form>
                            @if($errors->any())
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Card de Login -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center">Login</h2>
                            <form action="/login" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn btn-primary w-100">Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection




@extends('layouts.masterPage')
@section('pretitle', 'Projetos')
@section('title', 'Criar Projeto')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        {{--Alert Box de Erros--}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <i class="ti ti-exclamation-circle"></i>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">Existem erros no formulário</h4>
                                        <div class="text-secondary">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                        @endif

                        <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                                <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{old('description')}}</textarea>
                                <div class="invalid-feedback">@error('description') {{$message}} @enderror</div>

                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Data de Conclusão</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
                                <div class="invalid-feedback">@error('due_date') {{ $message }} @enderror</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Criar</button>
                            <a href="{{route('projects.index')}}" class="btn btn-secondary">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@push('scripts')
    {{--O meu JS para essa página--}}
@endpush


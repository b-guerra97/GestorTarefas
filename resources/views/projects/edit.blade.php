@extends('layouts.masterPage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3>Editar Projeto</h3>
                        <form action="{{ route('projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $project->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Data de Conclusão</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $project->due_date) }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status do Projeto</label>
                                <select class="form-control" id="status" name="status_id">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ old('status_id', $project->status_id) == $status->id ? 'selected' : '' }}>{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="{{route('projects.index')}}" class="btn btn-secondary">Voltar</a>
                        </form>

{{--                        <form action="{{ route('tasks.create') }}" method="GET" class="mt-3">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-secondary">Criar Nova Tarefa</button>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

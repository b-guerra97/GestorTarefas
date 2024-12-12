@extends('layouts.masterPage')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Criar Nova Tarefa</h3>
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $projectId }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome da Tarefa</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição da Tarefa</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status da Tarefa</label>
                                <select class="form-control" id="status" name="status">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-secondary">Criar Tarefa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

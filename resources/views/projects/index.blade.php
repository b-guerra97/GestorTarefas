@php use Illuminate\Support\Str; @endphp
@extends('layouts.masterPage')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Bem-Vindo, {{ auth()->user()->name }}</h1>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Log Out</button>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{route('projects.create')}}" class="btn btn-primary mb-3">Criar Novo Projeto</a>

                @if($projects->isEmpty())
                    <p class="mt-4">Você ainda não possui projetos criados.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Data de Conclusão</th>
                                <th class="w-auto text-end">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="d-none">{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ Str::limit($project->description, 40) }}</td>
                                    <td>{{ $project->status->status}}</td>
                                    <td>{{$project->due_date}}</td>
                                    <td class="text-end">
                                        <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-secondary">
                                            <i class="fa fa-plus" aria-hidden="true"></i> </a>

                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{-- O meu JS para essa página --}}
@endpush

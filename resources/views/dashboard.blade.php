@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="jumbotron p-5 rounded shadow-sm" style="background-color: #333; color: #f8f9fa;">
        <h1 class="display-4 text-center">Bem-vindo ao Portal ImagemCerta</h1>
        <p class="lead text-center mt-3">
            Somos uma empresa dedicada a capturar os momentos mais incríveis e compartilhá-los com o mundo.
        </p>
    </div>

    <div class="row mt-4">
        <h3 class="text-center w-100 mb-4">Explorando Momentos</h3>
        @if($fotos->isEmpty())
            <p class="text-center">Nenhuma foto no momento.</p>
        @else
            @foreach($fotos as $foto)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $foto->caminho) }}" class="card-img-top" alt="{{ $foto->titulo }}" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $foto->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $foto->titulo }}</h5>
                            <p class="card-text">{{ $foto->descricao }}</p>
                            <p class="card-text">
                                <small class="text-muted">Autor: {{ ucfirst($foto->user->name ?? 'Desconhecido') }}</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="fotoModal{{ $foto->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $foto->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fotoModalLabel{{ $foto->id }}">{{ $foto->titulo }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $foto->caminho) }}" class="img-fluid" alt="{{ $foto->titulo }}">
                                <p class="mt-3">{{ $foto->descricao }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<footer class="mt-5 py-4" style="background-color: #333; color: #f8f9fa; border-radius: 6px 6px 0 0;">
    <div class="container">
        <div class="text-center">
            <small>&copy; {{ date('Y') }} Desenvolvido por <strong>Railton Araujo</strong>. Todos os direitos reservados.</small>
        </div>
    </div>
</footer>
@endsection


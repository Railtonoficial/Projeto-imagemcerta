@extends('layouts.app')

@section('title', 'Fotos Aprovadas')

@section('content')
    <div class="container">
        <h1 class="my-4">Fotos Aprovadas</h1>
        <div class="row">
            @foreach($fotos as $foto)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $foto->caminho) }}" class="card-img-top" alt="{{ $foto->titulo }}" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $foto->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $foto->titulo }}</h5>
                            <p class="card-text">{{ $foto->descricao }}</p>
                            <span class="badge bg-success"><i class="fas fa-check"></i> Aprovado</span>
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
        </div>
    </div>
@endsection

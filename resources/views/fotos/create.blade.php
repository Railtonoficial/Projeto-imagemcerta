@extends('layouts.app')

@section('title', 'Enviar Foto')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4 text-center">Enviar Foto</h1>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-sm p-4">
                    <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite o título da foto" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control" rows="4" placeholder="Descreva brevemente a foto" required></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Usando Bootstrap 5 para compatibilidade -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script de Desaparecimento do Alerta -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.querySelector('.alert');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');  // Remove a classe 'show' para esconder
                alert.classList.add('fade');     // Adiciona a classe 'fade' para a animação
                setTimeout(() => {
                    alert.classList.add('d-none'); // Depois de 1 segundo (tempo da animação), esconde o alerta
                }, 1000);
            }, 3000); // A mensagem desaparecerá após 3 segundos
        }
    });
</script>

<!-- Agora o app.js é carregado após os outros scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>

@endsection

@extends('home')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Libros</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>
    <!-- Inicio del cuerpo-->

    <body style="background-color: #EECE7B">

        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #A77A4A">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <h3>Libreria online</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3 class="mt-3 mb-2"> Catergorias </h3>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Nuevo
                    </button>

                    <div class="table-responsive mt-2">
                        <table class="table shadow-lg">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col" style="background-color: #ceae59">ID</th>
                                    <th scope="col" style="background-color: #ceae59">Nombre</th>
                                    <th scope="col" style="background-color: #ceae59">Tipo</th>
                                    <th style="background-color: #ceae59">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classifications as $Classification)
                                    <tr class="">
                                        <td scope="row" style="background-color: #e1d1a7">{{ $Classification->id }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Classification->name }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Classification->type }}</td>
                                        <td style="background-color: #e1d1a7"><button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#edit-classification-modal{{ $Classification->id }}">
                                                Editar
                                            </button>
                                            <h1> </h1>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $Classification->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>


        </main>
        <!-- Modales de edición y eliminación fuera del foreach principal -->
        @foreach ($classifications as $Classification)
        <!-- Modal para Editar -->
        <div class="modal fade" id="edit-classification-modal{{ $Classification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar clasificacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('Classification.update', $Classification->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id=""
                                       aria-describedby="helpId" placeholder="" value="{{ $Classification->name }}" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" id=""
                                       aria-describedby="helpId" placeholder="" value="{{ $Classification->type }}" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal para Eliminar -->
        <div class="modal fade" id="delete{{ $Classification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar clasificacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('Classification.destroy', $Classification->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            Estas seguro de eliminar a <strong>{{ $Classification->name }}</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal para Crear un nuevo libro -->
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar clasificacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('Classification.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" id=""
                                       aria-describedby="helpId" placeholder="" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tipo</label>
                                <input type="text" class="form-control" name="type" id=""
                                       aria-describedby="helpId" placeholder="" />
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection

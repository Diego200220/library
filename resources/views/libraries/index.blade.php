@extends('home')
@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Libros</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQ+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>
    <!-- Inicio del cuerpo-->

    <body style="background-color: #EECE7B">
        <header>
            <!-- place navbar here -->
            <x-nav-bar-tables/>

        </header>
        <main>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-4">
                    <h3> Librerias </h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Nuevo
                    </button>
                    <div class="table-responsive mt-3">
                        <table class="table shadow-lg" style="background-color: #EECE7B">
                            <thead class="bg-dark text-white" style="background-color: #EECE7B">
                                <tr>
                                    <th scope="col" style="background-color: #ceae59">ID</th>
                                    <th scope="col" style="background-color: #ceae59">Nombre</th>
                                    <th scope="col" style="background-color: #ceae59">Slug</th>
                                    <th style="background-color: #ceae59">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libraries as $Library)
                                    <tr class="">
                                        <td scope="row" style="background-color: #e1d1a7">{{ $Library->id }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Library->name }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Library->slug }}</td>
                                        <td style="background-color: #e1d1a7">
                                            <button type="button" class="btn btn-success" onclick="editLibrary({{ $Library->id }})"><img src="img/editar.png" style="width: 23px"></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteLibrary({{ $Library->id }})"><img src="img/eliminar.png" style="width: 23px"></button>
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

        <!-- Modal para Editar -->
        <x-modal-edit
            id="edit-library-modal"
            labelledBy="editLibraryLabel"
            title="Editar Librería"
            action="{{ route('Libraries.update', $Library->id) }}"
            method="PUT"
            submitText="Guardar">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="{{ $Library->name }}"
                    placeholder="Nombre de la librería" />
                <small class="form-text text-muted">Por ejemplo: Biblioteca Central.</small>
            </div>
        </x-modal-edit>
        <!-- Modal para Eliminar -->
        <x-modal-destroy
            id="delete-library-modal"
            title="Eliminar Libreria"
            :action="route('Libraries.destroy', ':id')"
            confirmationText="¿Estás seguro de eliminar a esta libreria?"
            confirmButtonText="Confirmar"
            cancelButtonText="Cerrar"
        />
        <!-- Modal para Crear un nuevo libro -->

        <x-modal-create
            id="create"
            title="Agregar Libreria"
            :action="route('Libraries.store')"
        >
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id=""
                       aria-describedby="helpId" placeholder="" />
            </div>
        </x-modal-create>

        <script>
            const editLibraryModal = new bootstrap.Modal('#edit-library-modal');

            /*
            Definir una función -> consultar api -> obtener los datos de un libro -> actualizar la acción del formulario -> llenar los inputs del modal -> mostrar el modal
            */
            // Definir una función
            function editLibrary(libraryId) {
                fetch('{{ route("libraries.show", ":id") }}'.replace(':id', libraryId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // actualiza los datos del formulario
                        document.querySelector('#edit-library-modal form').action = `/libraries/${libraryId}`;

                        // llenado
                        document.querySelector('#edit-library-modal input[name="name"]').value = response.data.libraries.name;

                        // mostrar el modal
                        editLibraryModal.show();
                    })
                    .catch(error =>  window.alert('Error fetching JSON:', error));
            }

            const deleteLibraryModal = new bootstrap.Modal('#delete-library-modal');
            function deleteLibrary(libraryId) {
                fetch('{{ route("libraries.show", ":id") }}'.replace(':id', libraryId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // Muestra el id de los datos
                        document.querySelector('#delete-library-modal form').action = `/libraries/${libraryId}`;

                        // mostrar el modal
                        deleteLibraryModal.show();
                    })
                    .catch(error =>  window.alert('Error fetching JSON:', error));
            }
        </script>
        <footer>
            <!-- place footer here -->
        </footer>
    </body>

    </html>
@endsection

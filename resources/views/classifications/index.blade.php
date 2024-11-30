@extends('home')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Libros</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
                                        <td style="background-color: #e1d1a7">
                                            <button type="button" class="btn btn-success"  onclick="editClassification({{ $Classification->id }})"><img src="img/editar.png" style="width: 23px"></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteClassification({{ $Classification->id }})"><img src="img/eliminar.png" style="width: 23px"></button>
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
        <!-- Modal para Editar -->

        <x-modal-edit
            id="edit-classifications-modal"
            labelledBy="editClassificationLabel"
            title="Editar Clasificación"
            action="{{ route('Classification.update', $Classification->id) }}"
            method="PUT"
            submitText="Guardar">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="{{ $Classification->name }}"
                    placeholder="Nombre de la clasificación" />
                <small class="form-text text-muted">Ejemplo: Ficción, Historia, etc.</small>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input
                    type="text"
                    class="form-control"
                    name="type"
                    id="type"
                    value="{{ $Classification->type }}"
                    placeholder="Tipo de clasificación" />
                <small class="form-text text-muted">Ejemplo: General, Específico, etc.</small>
            </div>
        </x-modal-edit>


        <!-- Modal para Eliminar -->
        <x-modal-destroy
            id="delete-classifications-modal"
            title="Eliminar Clasificación"
            :action="route('Classification.destroy', ':id')"
            confirmationText="¿Estás seguro de eliminar esta clasificación?"
            confirmButtonText="Confirmar"
            cancelButtonText="Cerrar"
        />
        <!-- Modal para Crear un nuevo libro -->
        <x-modal-create
            id="create"
            title="Agregar Clasificacion"
            :action="route('Classification.store')"
        >
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
        </x-modal-create>


        <script>
            const editClassificationsModal = new bootstrap.Modal('#edit-classifications-modal');
            const deleteClassificationsModal = new bootstrap.Modal('#delete-classifications-modal');
            /*
            Definir una función -> consultar api -> obtener los datos de un libro -> actualizar la acción del formulario -> llenar los inputs del modal -> mostrar el modal
            */
            // Definir una función
            function editClassification(ClassificationId) {
                fetch('{{ route("classifications.show", ":id") }}'.replace(':id', ClassificationId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // actualiza los datos del formulario
                        document.querySelector('#edit-classifications-modal form').action = `/classifications/${ClassificationId}`;

                        // llenado
                        document.querySelector('#edit-classifications-modal input[name="name"]').value = response.data.classification.name;
                        document.querySelector('#edit-classifications-modal input[name="type"]').value = response.data.classification.type;

                        // mostrar el modal
                        editClassificationsModal.show();
                    })
                    .catch(error => window.alert('Error fetching JSON:', error));
            }

            function deleteClassification(ClassificationId) {
                fetch('{{ route("classifications.show", ":id") }}'.replace(':id', ClassificationId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // Muestra el id de los datos
                        document.querySelector('#delete-classifications-modal form').action = `/classifications/${ClassificationId}`;

                        // mostrar el modal
                        deleteClassificationsModal.show();
                    })
                    .catch(error => window.alert('Error fetching JSON:', error));
            }
        </script>
        <footer>
    </body>

    </html>
@endsection

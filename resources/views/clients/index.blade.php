@extends('home')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Clientes</title>
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
                    <h3> Clientes </h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Nuevo
                    </button>
                    <div class="table-responsive mt-3">
                        <table class="table shadow-lg" style="background-color: #EECE7B">
                            <thead class="bg-dark text-white" style="background-color: #EECE7B">
                                <tr>
                                    <th scope="col" style="background-color: #ceae59">ID</th>
                                    <th scope="col" style="background-color: #ceae59">Nombre</th>
                                    <th scope="col" style="background-color: #ceae59">Apellidos</th>
                                    <th scope="col" style="background-color: #ceae59">Tarjeta de membresia</th>

                                    <th style="background-color: #ceae59">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $Client)
                                    <tr class="">
                                        <td scope="row" style="background-color: #e1d1a7">{{ $Client->id }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Client->name }}</td>
                                        <td style="background-color: #e1d1a7">{{ $Client->last_name }}
                                        <td style="background-color: #e1d1a7">{{ $Client->membership_card }}</td>

                                        <td style="background-color: #e1d1a7">
                                            <button type="button" class="btn btn-success" onclick="editClient({{ $Client->id }})"><img src="img/editar.png" style="width: 23px"></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteClient({{ $Client->id }})"><img src="img/eliminar.png" style="width: 23px"></button>
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
            id="edit-client-modal"
            labelledBy="editClientLabel"
            title="Editar Cliente"
            action="{{ route('Clients.update', $Client->id) }}"
            method="PUT"
            submitText="Guardar">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="{{ $Client->name }}"
                    placeholder="Nombre del cliente" />
                <small class="form-text text-muted">Por ejemplo: Juan.</small>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input
                    type="text"
                    class="form-control"
                    name="last_name"
                    id="last_name"
                    value="{{ $Client->last_name }}"
                    placeholder="Apellido del cliente" />
                <small class="form-text text-muted">Por ejemplo: Pérez.</small>
            </div>
        </x-modal-edit>
        <!-- Modal para Eliminar -->
        <x-modal-destroy
            id="delete-client-modal"
            title="Eliminar Cliente"
            :action="route('Clients.destroy', ':id')"
            confirmationText="¿Estás seguro de eliminar a este cliente?"
            confirmButtonText="Confirmar"
            cancelButtonText="Cerrar"
        />
        <!-- Modal para Crear un nuevo libro -->
        <x-modal-create
            id="create"
            title="Agregar Cliente"
            :action="route('Clients.store')"
        >
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id=""
                       aria-describedby="helpId" placeholder="" />
                <small id="helpId" class="form-text text-muted">"Jose David"</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="last_name" id=""
                       aria-describedby="helpId" placeholder="" />
                <small id="helpId" class="form-text text-muted">"Martinez Paladin"</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tarjeta de membresia</label>
                <input type="text" class="form-control" name="membership_card" id=""
                       aria-describedby="helpId" placeholder="" />
                <small id="helpId" class="form-text text-muted">"Codigo de membesia (233xs)"</small>
            </div>
        </x-modal-create>
        <script>
            const editClientModal = new bootstrap.Modal('#edit-client-modal');
            const deleteClientModal = new bootstrap.Modal('#delete-client-modal');

            /*
            Definir una función -> consultar api -> obtener los datos de un libro -> actualizar la acción del formulario -> llenar los inputs del modal -> mostrar el modal
            */
            // Definir una función
            function editClient(clientId) {
                fetch('{{ route("clients.show", ":id") }}'.replace(':id', clientId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // actualiza los datos del formulario
                        document.querySelector('#edit-client-modal form').action = `/clients/${clientId}`;

                        // llenado
                        document.querySelector('#edit-client-modal input[name="name"]').value = response.data.client.name;
                        document.querySelector('#edit-client-modal input[name="last_name"]').value = response.data.client.last_name;

                        // mostrar el modal
                        editClientModal.show();
                    })
                    .catch(error =>  window.alert('Error fetching JSON:', error));
            }

            function deleteClient(clientId) {
                fetch('{{ route("clients.show", ":id") }}'.replace(':id', clientId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // Muestra el id de los datos
                        document.querySelector('#delete-client-modal form').action = `/clients/${clientId}`;

                        // mostrar el modal
                        deleteClientModal.show();
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

@extends('home')
@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Renta</title>
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
        <x-nav-bar-tables/>
        </header>
        <main>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <h3> Rentas </h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Nuevo
                    </button>
                    <div class="table-responsive mt-2" style="background-color: #EECE7B">
                        <table class="table shadow-lg" style="background-color: #EECE7B">
                            <thead class="bg-dark text-white" style="background-color: #EECE7B">
                                <tr>
                                    <th scope="col" style="background-color: #ceae59">ID</th>
                                    <th scope="col" style="background-color: #ceae59">Ticket</th>
                                    <th scope="col" style="background-color: #ceae59">Libro</th>
                                    <th scope="col" style="background-color: #ceae59">Cliente</th>
                                    <th scope="col" style="background-color: #ceae59">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentbooks as $RentBook)
                                    <tr class="">
                                        <td scope="row" style="background-color: #e1d1a7">{{ $RentBook->id }}</td>
                                        <td style="background-color: #e1d1a7">{{ $RentBook->ticket }}</td>
                                        <td style="background-color: #e1d1a7">{{ $RentBook->book->title }}</td>
                                        <td style="background-color: #e1d1a7">{{ $RentBook->client->name }}</td>
                                        <td style="background-color: #e1d1a7">
                                            <button type="button" class="btn btn-success" onclick="editRentBook({{ $RentBook->id }})"><img src="img/editar.png" style="width: 23px"></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteRentBook({{ $RentBook->id }})"><img src="img/eliminar.png" style="width: 23px"></button>
                                        </td>
                                    </tr>
                                    <!-- Quitar esto -->
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
            id="edit-rent-modal"
            labelledBy="editRentLabel"
            title="Editar Renta"
            action="{{ route('RentBook.update', $RentBook->id) }}"
            method="PUT"
            submitText="Guardar">
            <div class="mb-3">
                <label for="ticket" class="form-label">Renta</label>
                <input
                    type="text"
                    class="form-control"
                    name="ticket"
                    id="ticket"
                    value="{{ $RentBook->ticket }}"
                    placeholder="Número de ticket" />
                <small class="form-text text-muted">Ejemplo: 12345.</small>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Libro</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $Book)
                    <option value="{{ $Book->id }}"
                            {{ $Book->id == $RentBook->book_id ? 'selected' : '' }}>
                        {{ $Book->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach ($clients as $Client)
                    <option value="{{ $Client->id }}"
                            {{ $Client->id == $RentBook->client_id ? 'selected' : '' }}>
                        {{ $Client->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </x-modal-edit>

        <!-- Modal para Eliminar -->
        <x-modal-destroy
            id="delete-rent-modal"
            title="Eliminar Libreria"
            :action="route('RentBook.destroy', ':id')"
            confirmationText="¿Estás seguro de eliminar a esta libreria?"
            confirmButtonText="Confirmar"
            cancelButtonText="Cerrar"
        />

        <!-- Modal para Crear un nuevo libro -->
        <x-modal-create
            id="create"
            title="Agregar Renta"
            :action="route('RentBook.store')"
        >
            <div class="mb-3">
                <label for="book_id" class="form-label">Libro</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $Book)
                    <option value="{{ $Book->id }}">{{ $Book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ticket" class="form-label">Ticket</label>
                <input type="text" class="form-control" name="ticket" id="ticket" aria-describedby="ticketHelp" placeholder="">
                <small id="ticketHelp" class="form-text text-muted">Ejemplo: TIK001</small>
            </div>
            <div class="mb-3">
                <label for="client_id" class="form-label">Cliente</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach ($clients as $Client)
                    <option value="{{ $Client->id }}">{{ $Client->name }}</option>
                    @endforeach
                </select>
            </div>
        </x-modal-create>

        <script>
            const editRentModal = new bootstrap.Modal('#edit-rent-modal');
            const deleteRentModal = new bootstrap.Modal('#delete-rent-modal');

            /*
            Definir una función -> consultar api -> obtener los datos de un libro -> actualizar la acción del formulario -> llenar los inputs del modal -> mostrar el modal
            */
            // Definir una función
            function editRentBook(rentId) {
                fetch('{{ route("rentbook.show", ":id") }}'.replace(':id', rentId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // actualiza los datos del formulario
                        document.querySelector('#edit-rent-modal form').action = `/RentBook/${rentId}`;
                        // llenado
                        document.querySelector('#edit-rent-modal input[name="ticket"]').value = response.data.rentbooks.ticket;
                        document.querySelector('#edit-rent-modal select[name="book_id"]').value = response.data.rentbooks.book_id;
                        document.querySelector('#edit-rent-modal select[name="client_id"]').value = response.data.rentbooks.client_id;

                        // mostrar el modal
                        editRentModal.show();
                    })
                    .catch(error =>  window.alert('Error fetching JSON:', error));
            }

            function deleteRentBook(rentId) {
                fetch('{{ route("rentbook.show", ":id") }}'.replace(':id', rentId)) // consultar api
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(response => {
                        // Muestra el id de los datos
                        document.querySelector('#delete-rent-modal form').action = `/RentBook/${rentId}`;

                        // mostrar el modal
                        deleteRentModal.show();
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

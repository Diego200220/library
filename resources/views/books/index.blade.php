@extends('home')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <title>Libros</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQ+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color: #EECE7B">
<header>
    <x-nav-bar-tables/>
</header>
<main>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br>
            <h3> Libros </h3>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Nuevo
            </button>

            <div class="table-responsive mt-2" style="background-color: #EECE7B">
                <table class="table shadow-lg" style="background-color: #EECE7B">
                    <thead class="bg-dark text-white" style="background-color: #EECE7B">
                    <tr>
                        <th scope="col" style="background-color: #ceae59">ID</th>
                        <th scope="col" style="background-color: #ceae59">Titulo</th>
                        <th scope="col" style="background-color: #ceae59">Autor</th>
                        <th scope="col" style="background-color: #ceae59">Libreria</th>
                        <th scope="col" style="background-color: #ceae59">Clasificacion</th>
                        <th scope="col" style="background-color: #ceae59">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $Book)
                    <tr>
                        <td style="background-color: #e1d1a7">{{ $Book->id }}</td>
                        <td style="background-color: #e1d1a7">{{ $Book->title }}</td>
                        <td style="background-color: #e1d1a7">{{ $Book->author }}</td>
                        <td style="background-color: #e1d1a7">{{ $Book->library->name }}</td>
                        <td style="background-color: #e1d1a7">{{ $Book->classification->name }}</td>
                        <td style="background-color: #e1d1a7">
                            <button type="button" class="btn btn-success" onclick="editBook({{ $Book->id }})" ><img src="img/editar.png" style="width: 23px"></button>
                            <button type="button" class="btn btn-danger" onclick="deleteBook({{ $Book->id }})"  ><img src="img/eliminar.png" style="width: 23px"></button>
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
    id="edit-book-modal"
    labelledBy="exampleModalLabel"
    title="Editar libro"
    action="{{ route('Book.update', $Book->id) }}"
    method="PUT"
    submitText="Guardar">

    <div class="mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="title" value="{{ $Book->title }}" />
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Autor</label>
        <input type="text" class="form-control" name="author" value="{{ $Book->author }}" />
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{ $Book->slug }}" disabled />
    </div>
    <div class="mb-3">
        <label for="library_id" class="form-label">Libreria</label>
        <select name="library_id" class="form-control">
            @foreach ($libraries as $library)
            <option value="{{ $library->id }}">{{ $library->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="classification_id" class="form-label">Clasificación</label>
        <select name="classification_id" class="form-control">
            @foreach ($classifications as $classification)
            <option value="{{ optional($classification)->id }}">{{ optional($classification)->name }}</option>
            @endforeach
        </select>
    </div>
</x-modal-edit>

<!-- Modal para Eliminar -->
<x-modal-destroy
    id="delete-book-modal"
    title="Eliminar libro"
    action="{{ route('Book.destroy', ':id') }}"
    confirmationText="¿Estás seguro de eliminar este libro?"
    confirmButtonText="Eliminar"
    cancelButtonText="Cancelar"
/>

<!-- Modal para Crear un nuevo libro -->
<x-modal-create
    id="create"
    title="Agregar Libro"
    :action="route('Book.store')"
>
    <div class="mb-3">
        <label for="" class="form-label">Titulo</label>
        <input
            type="text"
            class="form-control"
            name="title"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <small id="helpId" class="form-text text-muted">"Harry Potter"</small>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Autor</label>
        <input
            type="text"
            class="form-control"
            name="author"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <small id="helpId" class="form-text text-muted">Pablo Neruda</small>
    </div>

    <div class="mb-3">
        <label for="" class="form-label"> Clasificacion</label>
        <select name="classification_id" id="" class="form-control">
            @foreach($classifications as $Classification)
            <option value="{{$Classification->id}}">{{$Classification->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label"> Libreria</label>
        <select name="library_id" id="" class="form-control">
            @foreach($libraries as $Library)
            <option value="{{$Library->id}}">{{$Library->name}}</option>
            @endforeach
        </select>
    </div>

</x-modal-create>
    <script>
        const editBookModal = new bootstrap.Modal('#edit-book-modal');
        const deleteBookModal = new bootstrap.Modal('#delete-book-modal');

        /*
        Definir una función -> consultar api -> obtener los datos de un libro -> actualizar la acción del formulario -> llenar los inputs del modal -> mostrar el modal
        */
        // Definir una función
        function editBook(bookId) {
            fetch('{{ route("books.show", ":id") }}'.replace(':id', bookId)) // consultar api
             .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(response => {
                    // actualiza los datos del formulario
                    document.querySelector('#edit-book-modal form').action = `/books/${bookId}`;

                    // llenado
                    document.querySelector('#edit-book-modal input[name="title"]').value = response.data.book.title;
                    document.querySelector('#edit-book-modal input[name="author"]').value = response.data.book.author;
                    document.querySelector('#edit-book-modal input[name="slug"]').value = response.data.book.slug;
                    document.querySelector('#edit-book-modal select[name="library_id"]').value = response.data.book.library_id;
                    document.querySelector('#edit-book-modal select[name="classification_id"]').value = response.data.book.classification_id;

                    // mostrar el modal
                    editBookModal.show();
                })
                .catch(error => window.alert('Error fetching JSON:', error));
        }

        function deleteBook(bookId) {
            fetch('{{ route("books.show", ":id") }}'.replace(':id', bookId)) // consultar api
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(response => {
                    // Muestra el id de los datos
                    document.querySelector('#delete-book-modal form').action = `/books/${bookId}`;

                    // mostrar el modal
                    deleteBookModal.show();
                })
                .catch(error => window.alert('Error fetching JSON:', error));
        }
    </script>
</body>

</html>
@endsection

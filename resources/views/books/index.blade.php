@extends('home')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <title>Libros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>
<!-- Inicio del cuerpo-->
<body style="background-color: #EECE7B">

<header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #A77A4A">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h3>Libreria online</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <br>
            <h3> Libros </h3>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Nuevo
            </button>

            <div class="table-responsive mt-2" style="background-color: #EECE7B">
                <table class="table shadow-lg" style="background-color: #EECE7B">
                    <thead class="bg-dark text-white" style="background-color: #EECE7B">
                        <tr >
                            <th scope="col" style="background-color: #ceae59">ID</th>
                            <th scope="col" style="background-color: #ceae59">Titulo</th>
                            <th scope="col" style="background-color: #ceae59">Autor</th>
                            <th scope="col" style="background-color: #ceae59">libreria</th>
                            <th scope="col" style="background-color: #ceae59">Clasificacion</th>
                            <th scope="col" style="background-color: #ceae59">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $Book)
                        <tr class="">
                            <td scope="row" style="background-color: #e1d1a7">{{$Book->id}}</td>
                            <td style="background-color: #e1d1a7">{{$Book->title}}</td>
                            <td style="background-color: #e1d1a7">{{$Book->author}}</td>
                            <td style="background-color: #e1d1a7">{{$Book->library->name}}</td>
                            <td style="background-color: #e1d1a7">{{$Book->classification->name}}</td>
                            <td style="background-color: #e1d1a7">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$Book->id}}">
                                    Editar
                                </button>
                                <h1>  </h1>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$Book->id}}">
                                    Eliminar
                                </button></td>
                        </tr>
                    @include('Books.info')
                    @include('Books.delete')
                    @endforeach

                    </tbody>
                </table>
            </div>
        @include('books.create')
        </div>
        <div class="col-md-2"></div>
    </div>
</main>
<footer>
    <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
</body>
</html>
    @endsection

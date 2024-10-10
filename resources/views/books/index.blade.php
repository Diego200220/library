@extends('home')

@section('content-books')
<div
    class="row"
>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <h3> Libros </h3>
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Nuevo
        </button>

        <div
            class="table-responsive"
        >
            <table
                class="table"
            >
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Slug</th>
                        <th scope="col">libreria</th>
                        <th scope="col">Clasificacion</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">updated_at</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($books as $Book)
                    <tr class="">
                        <td scope="row">{{$Book->id}}</td>
                        <td>{{$Book->title}}</td>
                        <td>{{$Book->author}}</td>
                        <td>{{$Book->slug}}</td>
                        <td>{{$Book->library_id}}</td>
                        <td>{{$Book->ClassificationId->name}}</td>
                        <td>{{$Book->created_at}}</td>
                        <td>{{$Book->updated_at}}</td>
                        <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$Book->id}}">
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


@endsection


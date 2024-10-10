@extends('home')

@section('content')
<div
    class="row"
>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <h3> Catergorias </h3>
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
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($classifications as $Classification)
                    <tr class="">
                        <td scope="row">{{$Classification->id}}</td>
                        <td>{{$Classification->name}}</td>
                        <td>{{$Classification->type}}</td>
                        <td>{{$Classification->slug}}</td>
                        <td>{{$Classification->created_at}}</td>
                        <td>{{$Classification->updated_at}}</td>
                        <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$Classification->id}}">
                                Editar
                            </button>
                            <h1>  </h1>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$Classification->id}}">
                                Eliminar
                            </button></td>
                    </tr>
                @include('Classifications.info')
                @include('Classifications.delete')

                @endforeach

                </tbody>
            </table>
        </div>
    @include('classifications.create')

    </div>
    <div class="col-md-2"></div>
</div>


@endsection


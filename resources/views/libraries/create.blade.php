<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar libros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Book.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Titulo</label>
                    <input
                        type="text"
                        class="form-control"
                        name="Title"
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
                        name="Author"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted">Pablo Neruda</small>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> Libraria</label>
                    <select name="Library_id" id="" class="form-control">
                        @foreach($libraries as $Library)
                        <option value="{{$Library->id}}">{{$Library->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> Clasificacion</label>
                    <select name="Classification_id" id="" class="form-control">
                        @foreach($classifications as $Classification)
                        <option value="{{$Classification->id}}">{{$Classification->name}}</option>
                        @endforeach
                    </select>
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

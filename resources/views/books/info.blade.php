<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="edit{{$Book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar clasificacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Book.update',$Book->id)}}" method="POST">
                @csrf
                @method('PUT')
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
                            value="{{$Book->title}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
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
                            value="{{$Book->author}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Slug</label>
                        <input
                            type="text"
                            class="form-control"
                            name="Slug"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="{{$Book->slug}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Libreria</label>
                        <input
                            type="text"
                            class="form-control"
                            name="Library_id"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="{{$Book->library_id}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"> Classificacion</label>
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
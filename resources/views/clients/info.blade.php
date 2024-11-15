<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="edit{{$Client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Clients.update',$Client->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="{{$Client ->name}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input
                            type="text"
                            class="form-control"
                            name="last_name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="{{$Client ->last_name}}"
                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="delete{{$Client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Clients.destroy',$Client->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar a <strong>{{$Client->name}}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

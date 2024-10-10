<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar clasificacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Classification.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        name="Name"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tipo</label>
                    <input
                        type="text"
                        class="form-control"
                        name="Type"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
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

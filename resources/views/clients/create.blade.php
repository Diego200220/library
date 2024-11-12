<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Clients.store')}}" method="POST">
                @csrf
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
                    />
                    <small id="helpId" class="form-text text-muted">"Jose David"</small>
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
                    />
                    <small id="helpId" class="form-text text-muted">"Martinez Paladin"</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tarjeta de membresia</label>
                    <input
                        type="text"
                        class="form-control"
                        name="membership_card"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted">"Codigo de membesia (233xs)"</small>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

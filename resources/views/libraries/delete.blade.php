<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="delete{{$Library->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar clasificacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Libraries.destroy',$Library->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar a <strong>{{$Library->name}}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>


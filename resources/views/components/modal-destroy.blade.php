@props([
'id',
'title',
'action',
'confirmationText' => '¿Estás seguro de eliminar este elemento?',
'confirmButtonText' => 'Confirmar',
'cancelButtonText' => 'Cerrar',
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $action }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{ $confirmationText }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $cancelButtonText }}</button>
                    <button type="submit" class="btn btn-primary">{{ $confirmButtonText }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

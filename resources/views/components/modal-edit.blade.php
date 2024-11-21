@props(['id', 'labelledBy', 'title', 'action', 'method' => 'POST', 'submitText' => 'Guardar'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $labelledBy }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $labelledBy }}">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
                @csrf
                @if ($method !== 'GET')
                @method($method)
                @endif
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

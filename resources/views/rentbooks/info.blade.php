<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="edit{{$RentBook->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar renta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('RentBook.update',$RentBook->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Renta</label>
                        <input
                            type="text"
                            class="form-control"
                            name="ticket"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="{{$RentBook-> ticket}}"

                        />
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"> Libro</label>
                        <select name="book_id" id="" class="form-control">
                            @foreach($books as $Book)
                            <option value="{{$Book->id}}">{{$Book->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"> Cliente</label>
                        <select name="client_id" id="" class="form-control">
                            @foreach($clients as $Client)
                            <option value="{{$Client->id}}">{{$Client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

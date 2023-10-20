<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$book->id}}">Elimina</button>

<div class="modal fade" id="delete-modal-{{$book->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina libro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sicuro di voler eliminare il libro {{ $book->title }} ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('books.destroy', $book)}}" method="POST" class="my-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
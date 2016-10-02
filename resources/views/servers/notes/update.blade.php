@foreach($server->notes as $update)
    <div id="note-update" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update note</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('note.update', ['id' => $server["id"]]) }}" method="POST">
                        {{-- CSRF Token --}}
                        {{ csrf_field() }}

                        <input value="{{ $update->title }}" type="text" style="margin-bottom: 5px;" placeholder="Title" class="form-control" name="title">
                        <textarea name="note" class="form-control" placeholder="Note" rows="10">{{ $update->note }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endforeach
@if(count($server->notes) == 0)
    <div class="alert alert-info">
        There are no notes for this server.
    </div>
@else
    <table class="table table-condensed table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Staff memeber:</th>
            <th>Note:</th>
            <th>Actions:</th>
        </tr>
        </thead>
        <tbody>
            @foreach($server->notes as $note)
                <tr>
                    <td><code>N{{ $note->id }}</code></td>
                    <td>{{ $note->staff->name }}</td>
                    <td>{{ $note->title }}</td>
                    <td>
                        <a class="label label-info" data-toggle="modal" data-target="#note-read" href="#">Read</a>
                        <a class="label label-info" data-toggle="modal" data-target="#note-update" href="#">Edit</a>
                        <a class="label label-danger" href="{{ route('note.destroy', ['nid' => $note->id, 'sid' => $server["id"]]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
<?php

namespace App\Http\Controllers;

use App\BaseServers;
use App\Notes;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ServerNoteController
 * @package App\Http\Controllers
 */
class ServerNoteController extends Controller
{
    /**
     * ServerNoteController constructor.
     */
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }

    /**
     * Add a note to a server.
     *
     * The is no insert view because the view is a modal on the
     * specific server view.
     *
     * @url    POST: /servers/note/{id}
     * @param  Requests\NoteValidator $input
     * @param  int $id the server id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\NoteValidator $input, $id)
    {
        $note = Notes::create([
            'note'    => $input->note,
            'title'   => $input->title,
            'user_id' => auth()->user()->id
        ]);

        BaseServers::find($id)->notes()->attach($note->id);

        session()->flash('message', 'note inserted');
        return redirect()->back();
    }

    /**
     * Update a specific note.
     *
     * @url    /servers/notes/update/{id}
     * @param  Requests\NoteValidator $input
     * @param  int $id the note id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\NoteValidator $input, $id)
    {
        Notes::find($id)->update($input->except('_token'));
        session()->flash('message', 'Note has been updated.');
        return redirect()->back();
    }

    /**
     * Destroy a note.
     *
     * @url   /servers/notes/destroy/{sid}/{nid}
     * @param int $nid the note id.
     * @param int $sid the server id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($sid, $nid)
    {
        Notes::destroy($nid);
        BaseServers::find($sid)->notes()->sync([]);
        session()->flash('message', 'The note has been deleted');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(){
        $userId=Auth::id();
        $notes = Note::where('user_id','=',$userId)->paginate(3);
        return view('notes.index',['notes'=>$notes]);
    }

    public function create(){
        return view('notes.create');  
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:25|string',
            'body'=>'required|max:255',
        ]);

        Note::create(
            [
                'title'=>$request->title,
                'body'=>$request->body,
                'user_id' => Auth::id()
            ]
        );
        return redirect()->route('notes.index');

    }

    public function show($id){
        $note= Note::find($id);
        return view('notes.show',['note'=>$note]);
    }

    public function edit($id){
        $note = Note::find($id);
        return view('notes.edit',['note'=>$note]);        
    }

    public function update($id,Request $request){
        $request->validate([
            'title'=>'required|max:25|string',
            'body'=>'required|max:255',
        ]);
        Note::find($id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->route('notes.index');
    }
    public function destroy($id){
        $note = Note::find($id);
        if ($note) {
            $note->delete();
        }
        return redirect()->route('notes.index');      
    }
}

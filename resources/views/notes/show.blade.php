@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/note.css') }}">
@endsection

@section('main')
<main>
    <p>
        <strong>{{ $note->title }}</strong><br>
        {{ $note->body }}<br><br>
        {{ $note->updated_at }}<br>
    </p>
    <div class="button-container">
        <a href="{{ route('notes.edit', $note->id) }}" class="update">Update</a>
        <form action="{{ route('notes.delete', $note->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete">Delete</button>
        </form>
    </div>
</main>
@endsection

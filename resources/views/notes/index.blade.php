@extends('layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
@endsection
@section('main')
<main>
    @foreach ($notes as $note)
        <a href="{{route('notes.show',$note->id)}}" class="note-link"> <!-- Adjust route as needed -->
            <p>
                <strong>{{ $note->title }}</strong><br>
                {{ Str::limit($note->body,50, '...') }} <!-- Limit body text -->
            </p>
        </a>
    @endforeach
    <a href="{{ route('notes.store') }}" class="add-note">
        <span>+</span>
    </a>
</main>
@endsection

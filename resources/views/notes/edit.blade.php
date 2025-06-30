@extends('layout')
@section('style')
    <link rel="stylesheet"  href="{{ asset('css/create.css')}}">
@endsection
@section('main')
<main>
    <section class="form-container">
        <h2>Update a note</h2>
        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('notes.update', $note->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{old('title',$note->title)}}" required>
            
            <label for="body">Body:</label>
            <textarea id="body" name="body" required>{{ old('body', $note->body) }}</textarea>
            
            <button type="submit">Update note</button>
        </form>
    </section>
</main>
@endsection

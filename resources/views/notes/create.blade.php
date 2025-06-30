@extends('layout')
@section('style')
    <link rel="stylesheet"  href="{{ asset('css/create.css')}}">
@endsection
@section('main')
<main>
    <section class="form-container">
        <h2>Create a note</h2>
        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('notes.create')}}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="body">Body:</label>
            <textarea id="body" name="body" required></textarea>
            
            <button type="submit">Add note</button>
        </form>
    </section>
</main>
@endsection

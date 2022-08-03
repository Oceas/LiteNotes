{{-- user layout --}}
@extends('layouts.layout')
@section('content')

@foreach($notes as $note)
    <div class="note">
        {{-- link to view note --}}
        <a href="{{ route('notes.show', $note ) }}">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->body }}</p>
        </a>
    </div>
@endforeach

@endsection

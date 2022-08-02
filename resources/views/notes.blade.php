{{-- display users name --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->name }}</h1>
        </div>
    </div>
</div>

{{-- laravel logout form button --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

<hr/>

@foreach($notes as $note)
    <div class="note">
        {{-- link to view note --}}
        <a href="{{ route('notes.show', $note->id) }}">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->body }}</p>
        </a>

    </div>
@endforeach
<hr/>
{{-- create note form --}}
<form action="{{ route('notes.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
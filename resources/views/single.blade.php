{{-- button to go back to other notes --}}
<a href="{{ route('notes.index') }}" class="btn btn-primary">Back</a>

<hr/>
{{-- display note --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $note->title }}</h1>
            <p>{{ $note->body }}</p>
        </div>
    </div>
</div>

<hr/>
{{-- edit button --}}
<a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary"><button type="submit" class="btn btn-danger">Edit</button></a>

{{-- button to delete post --}}
<form action="{{ route('notes.destroy', $note->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
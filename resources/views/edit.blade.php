{{-- edit note form --}}
<form action="{{ route('notes.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $note->title }}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="3">{{ $note->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Author</h1>
    <form action="/edit-book/{{$book->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$book->title}}">
        <label for="author">Author:</label>
        <select name="author_id" id="author">
            @foreach ($authors as $author)
                <option value="{{$author['id']}}" {{ $book->author_id == $author['id'] ? 'selected' : '' }}>
                    {{$author['name']}}
                </option>
            @endforeach
        </select>
        <label for="cars">Published Date:</label>
        <input type="date" name="published_date" value="{{$book->published_date}}">
        <button>Save Changes</button>
    </form>
</body>
</html>
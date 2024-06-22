<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TutorHub</title>
</head>

<body>

    <h1>Welcome to TutorHub!</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>

    @foreach ($posts as $post)
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p>Offer by <em>{{$post->author}}</em> published on {{$post->created_at->format('d.m.y')}}</p>
        <p>Subject: <em>{{$post->subject}}</em></p>
        <p>Grade: <em>{{$post->grades}}</em></p>
        <p>Price: <em>{{$post->price}}</em>/hour</p>

        <p><form method="POST" action="{{ route('posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete post</button>
        </form></p>

        <p><form method="POST" action="{{ route('posts.update', $post->id) }}}">
            @csrf
            @method('PUT')
            <button type="submit">Edit post</button>
        </form></p>
    @endforeach

</body>
</html>
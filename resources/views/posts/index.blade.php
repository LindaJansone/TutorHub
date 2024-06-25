<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TutorHub</title>
</head>

<body>

    <h1>Welcome to TutorHub!</h1>
    @auth
    <h2><a href="{{ route('posts.create') }}">Create post</a></h2>
    @endauth

    @foreach ($posts as $post)
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p>Offer by <em>{{ $post->author->name }}</em> published on {{ $post->created_at->format('d.m.y') }}</p>
        <p>Subject: <em>{{ $post->subject }}</em></p>
        <p>Grade: <em>{{ $post->grades }}</em></p>
        <p>Price: <em>{{ $post->price }}</em>/hour</p>

        @can('update-post', $post)
        <p>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete post</button>
            </form>
        </p>

        <p>
            <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                <button type="submit">Edit post</button>
            </form>
        </p>
        @endcan
    @endforeach

</body>
</html>

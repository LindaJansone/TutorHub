<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
</head>
<body>
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Subject: <em>{{$post->subject}}</em></p>
        <p>Grade: <em>{{$post->grades}}</em></p>
        <p>Price: <em>{{$post->price}}</em>/hour</p>
        <p>Author: {{ $post->author }}</p>
        <p>Published at: {{ $post->created_at->format("d.m.Y H:i:s") }}</p>

        <h3>Comments:</h3>

        <button id="showCommentForm">Add Comment</button>

        <div id="commentForm" style="display:none;">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div>
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" required>
                </div>
                <div>
                    <label for="content">Comment:</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <button type="submit">Submit Comment</button>
            </form>
        </div>
    </div>
    
        <ul>
            @foreach($post->comments as $comment)
                <li>
                    <p>{{ $comment->content }}</p>
                    <p>By: {{ $comment->author }}</p>
                    <p>Posted at: {{ $comment->created_at->format("d.m.Y H:i:s") }}</p>
                </li>
            @endforeach
        </ul>


    <script>
        document.getElementById('showCommentForm').addEventListener('click', function() {
            document.getElementById('commentForm').style.display = 'block';
        });
    </script>
</body>
</html>

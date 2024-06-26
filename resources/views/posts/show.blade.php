<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <a href="{{ url('locale/en') }}">ENG</a>
    <a href="{{ url('locale/lv') }}">LV</a>

    <title>{{$post->title}}</title>
</head>
<body>
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>@lang('msg.subject'): <em>{{$post->subject}}</em></p>
        <p>@lang('msg.grade'): @if($post->grades === 'Other') @lang('msg.other') @else{{ $post->grades }} @endif
        <p>@lang('msg.price'): <em>{{$post->price}}</em>/hour</p>
        <p>@lang('msg.offer_by') <em>{{ $post->author->name }}</em> @lang('msg.published_on') {{ $post->created_at->format('d.m.y') }}</p>
        <p>@lang('msg.language'): <em> @if($post->language === 'Other') @lang('msg.other') @else{{ $post->language }} @endif</em></p>

        <h3>@lang('msg.comments'):</h3>
        @auth
        <button id="showCommentForm">@lang('msg.add_comment')</button>
        @endauth

        <div id="commentForm" style="display:none;">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <button type="submit">@lang('msg.sub_comment')</button>
            </form>
        </div>
    </div>

        <ul>
            @foreach($post->comments as $comment)
                <li>
                    <p>{{ $comment->content }}</p>
                    <p>@lang('msg.pub_comment') <em>{{ $post->author->name }}</em> @lang('msg.published_on') {{ $post->created_at->format('d.m.y H:i:s') }}</p>
                </li>

                @can('update-comment', $comment)
                <p>
                    <form method="POST" action="{{ route('comments.destroy', $comment->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">@lang('msg.del_comment')</button>
                    </form>

                </p>
                @endcan
            @endforeach
        </ul>


    <script>
        document.getElementById('showCommentForm').addEventListener('click', function() {
            document.getElementById('commentForm').style.display = 'block';
        });
    </script>
</body>
</html>

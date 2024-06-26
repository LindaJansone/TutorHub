@foreach ($posts as $post)
    <div class="post">
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p>@lang('msg.offer_by') <em>{{ $post->author->name }}</em> @lang('msg.published_on') {{ $post->created_at->format('d.m.y') }}</p>
        <p>@lang('msg.subject'): <em>@lang('msg.' . strtolower($post->subject))</em></p>
        <p>@lang('msg.grade'): <em>{{ $post->grades }}</em></p>
        <p>@lang('msg.price'): <em>{{ $post->price }}</em>@lang('msg.hour')</p>

        @can('delete-post', $post)
        <p>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">@lang('msg.delete_post')</button>
            </form>
        </p>
        @endcan
        @can('update-post', $post)
        <p>
            <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                <button type="submit">@lang('msg.edit_post')</button>
            </form>
        </p>
        @endcan
    </div>
@endforeach

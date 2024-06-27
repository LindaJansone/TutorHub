@foreach ($posts as $post)
    <div class="post">
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p><b>@lang('msg.offer_by')</b> <em>{{ $post->author->name }}</em> <b>@lang('msg.published_on')</b> {{ $post->created_at->format('d.m.y') }}</p>
        <p><b>@lang('msg.subject'):</b> <em>@lang('msg.' . strtolower($post->subject))</em></p>
        <p><b>@lang('msg.grade'):</b> @if($post->grades === 'Other') @lang('msg.other') @else{{ $post->grades }} @endif
        <p><b>@lang('msg.price'):</b> <em>{{ $post->price }}</em>@lang('msg.hour')</p>
        <p><b>@lang('msg.language'): </b><em>@if($post->language === 'Other') @lang('msg.other') @else{{ $post->language }} @endif</em></p>

        <div class="button-container">
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
    </div>
@endforeach

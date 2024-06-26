<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <a href="{{ url('locale/en') }}">ENG</a>
    <a href="{{ url('locale/lv') }}">LV</a>

    @auth
    <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> @lang('msg.logout')</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
    @endauth

    <a href="/posts">@lang('msg.back')</a>
    
    <h1>@lang('msg.edit')</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">@lang('msg.title'):</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>

        <div>
            <label for="body">@lang('msg.body'):</label>
            <textarea id="body" name="body" required cols="80" rows="20">{{ $post->body }}</textarea>
        </div>

        <div>
            <label for="subject">@lang('msg.subject'):</label>
            <select id="subject" name="subject" required>
                <option value="">@lang('msg.select_subject')</option>
                <option value="English" {{ $post->subject == 'English' ? 'selected' : '' }}>@lang('msg.english')</option>
                <option value="Latvian" {{ $post->subject == 'Latvian' ? 'selected' : '' }}>@lang('msg.latvian')</option>
                <option value="Literature" {{ $post->subject == 'Literature' ? 'selected' : '' }}>@lang('msg.literature')</option>
                <option value="German" {{ $post->subject == 'German' ? 'selected' : '' }}>@lang('msg.german')</option>
                <option value="French" {{ $post->subject == 'French' ? 'selected' : '' }}>@lang('msg.french')</option>
                <option value="Russian" {{ $post->subject == 'Russian' ? 'selected' : '' }}>@lang('msg.russian')</option>
                <option value="Mathematics" {{ $post->subject == 'Mathematics' ? 'selected' : '' }}>@lang('msg.mathematics')</option>
                <option value="Science" {{ $post->subject == 'Science' ? 'selected' : '' }}>@lang('msg.science')</option>
                <option value="History" {{ $post->subject == 'History' ? 'selected' : '' }}>@lang('msg.history')</option>
                <option value="Geography" {{ $post->subject == 'Geography' ? 'selected' : '' }}>@lang('msg.geography')</option>
                <option value="Biology" {{ $post->subject == 'Biology' ? 'selected' : '' }}>@lang('msg.biology')</option>
                <option value="Chemistry" {{ $post->subject == 'Chemistry' ? 'selected' : '' }}>@lang('msg.chemistry')</option>
                <option value="Physics" {{ $post->subject == 'Physics' ? 'selected' : '' }}>@lang('msg.physics')</option>
                <option value="Computer Science" {{ $post->subject == 'Computer Science' ? 'selected' : '' }}>@lang('msg.computer science')</option>
                <option value="Art" {{ $post->subject == 'Art' ? 'selected' : '' }}>@lang('msg.art')</option>
                <option value="Music" {{ $post->subject == 'Music' ? 'selected' : '' }}>@lang('msg.music')</option>
                <option value="Economics" {{ $post->subject == 'Economics' ? 'selected' : '' }}>@lang('msg.economics')</option>
                <option value="Other" {{ $post->subject == 'Other' ? 'selected' : '' }}>@lang('msg.other')</option>
            </select>
        </div>


        <div>
            <label for="grades">@lang('msg.grades'):</label>
            <select id="grades" name="grades" required>
                <option value="">@lang('msg.all')</option>
                <option value="1-12" {{ $post->grades == '1-12' ? 'selected' : '' }}>1-12</option>
                <option value="1-3" {{ $post->grades == '1-3' ? 'selected' : '' }}>1-3</option>
                <option value="1-6" {{ $post->grades == '1-6' ? 'selected' : '' }}>1-6</option>
                <option value="4-6" {{ $post->grades == '4-6' ? 'selected' : '' }}>4-6</option>
                <option value="7-9" {{ $post->grades == '7-9' ? 'selected' : '' }}>7-9</option>
                <option value="7-12" {{ $post->grades == '7-12' ? 'selected' : '' }}>7-12</option>
                <option value="10-12" {{ $post->grades == '10-12' ? 'selected' : '' }}>10-12</option>
                <option value="Other" {{ $post->grades == 'Other' ? 'selected' : '' }}>@lang('msg.other')</option>
            </select>
        </div>

        <div>
            <label for="price">@lang('msg.price'):</label>
            <input type="text" id="price" name="price" value="{{ $post->price }}" required>
        </div>

        <div>
            <label for="language">@lang('msg.language'):</label>
            <select id="language" name="language" required>
                <option value="">Select Language</option>
                <option value="ENG" {{ $post->language == 'ENG' ? 'selected' : '' }}>English</option>
                <option value="LV" {{ $post->language == 'LV' ? 'selected' : '' }}>Latvian</option>
                <option value="Other" {{ $post->language == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <button type="submit">@lang('msg.sub_update')</button>
    </form>
</body>
</html>

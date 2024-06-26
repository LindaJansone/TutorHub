<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <a href="{{ url('locale/en') }}">ENG</a>
    <a href="{{ url('locale/lv') }}">LV</a>

    <h1>@lang('msg.create')</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">@lang('msg.title'):</label>
            <input type="text" id="title" name="title" value="" required>
        </div>

        <div>
            <label for="body">@lang('msg.body'):</label>
            <textarea id="body" name="body" required cols="80" rows="20"></textarea>
        </div>

        <div>
            <label for="subject">@lang('msg.subject'):</label>
                <select id="subject" name="subject">
                    <option value="">@lang('msg.all')</option>
                    <option value="English">@lang('msg.english')</option>
                    <option value="Latvian">@lang('msg.latvian')</option>
                    <option value="Literature">@lang('msg.literature')</option>
                    <option value="German">@lang('msg.german')</option>
                    <option value="French">@lang('msg.french')</option>
                    <option value="Russian">@lang('msg.russian')</option>
                    <option value="Mathematics">@lang('msg.mathematics')</option>
                    <option value="Science">@lang('msg.science')</option>
                    <option value="History">@lang('msg.history')</option>
                    <option value="Geography">@lang('msg.geography')</option>
                    <option value="Biology">@lang('msg.biology')</option>
                    <option value="Chemistry">@lang('msg.chemistry')</option>
                    <option value="Physics">@lang('msg.physics')</option>
                    <option value="Computer Science">@lang('msg.computer science')</option>
                    <option value="Art">@lang('msg.art')</option>
                    <option value="Music">@lang('msg.music')</option>
                    <option value="Economics">@lang('msg.economics')</option>
                    <option value="Other">@lang('msg.other')</option>
                </select>
        </div>  

        <div>
            <label for="grades">@lang('msg.grades'):</label>
            <select id="grades" name="grades">
                <option value="">@lang('msg.all')</option>
                <option value="1-12">1-12</option>
                <option value="1-3">1-3</option>
                <option value="1-6">1-6</option>
                <option value="4-6">4-6</option>
                <option value="7-9">7-9</option>
                <option value="7-12">7-12</option>
                <option value="10-12">10-12</option>
                <option value="Other">@lang('msg.other')</option>
            </select>
        </div>

        <div>
            <label for="price">@lang('msg.price'):</label>
            <input type="text" id="price" name="price" value="" required>
        </div>

        <div>
            <label for="language">@lang('msg.language'):</label>
            <select id="language" name="language" required>
                <option value="">@lang('msg.choose_lan')</option>
                <option value="ENG">ENG</option>
                <option value="LV">LV</option>
                <option value="RU">RU</option>
                <option value="Other">@lang('msg.other')</option>
            </select>
        </div>

        <button type="submit">@lang('msg.sub_create')</button>
    </form>
</body>
</html>

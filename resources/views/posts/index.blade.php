<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TutorHub</title>
    @vite('resources/css/design.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav>
        <div class="nav-left">
            <a href="#top" id="scrollToTop">TutorHub</a>
            <a href="{{ url('locale/en') }}">ENG</a>
            <a href="{{ url('locale/lv') }}">LV</a>
        </div>

        <div class="nav-right">
            @guest
                <a href="{{ route('login') }}">@lang('msg.login')</a>
                <a href="{{ route('register') }}">@lang('msg.register')</a>
            @endguest

            @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('msg.logout')</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @endauth
        </div>
    </nav>
    
    @guest
        <div class="welcome-container">
            <h1>@lang('msg.welcome')!</h1>   
        </div>
    @endguest
    @auth
    <div class="welcome-container">
        <h1>@lang('msg.welcome'), {{ Auth::user()->name }}!</h1>   
    </div>
    @endauth

    <div class="create-post-container">
    @auth
    
        <h2><a href="{{ route('posts.create') }}">@lang('msg.create')</a></h2>
    
    @endauth
    </div>

    <div class="container">
        <form id="filterForm">
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
                <label for="price_min">@lang('msg.price_min'):</label>
                <input type="number" id="price_min" name="price_min" step="0.01">
            </div>

            <div>
                <label for="price_max">@lang('msg.price_max'):</label>
                <input type="number" id="price_max" name="price_max" step="0.01">
            </div>

            <div>
                <label for="language">@lang('msg.language'):</label>
                <select id="language" name="language">
                    <option value="">@lang('msg.all')</option>
                    <option value="ENG">ENG</option>
                    <option value="LV">LV</option>
                    <option value="RU">RU</option>
                    <option value="Other">@lang('msg.other')</option>
                </select>
            </div>

            <div>
                <button type="submit">@lang('msg.apply_filters')</button>
            </div>
        </form>
        <div id="top"></div>
        <div id="postsContainer">
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
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('posts.index') }}",
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#postsContainer').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
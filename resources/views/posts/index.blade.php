<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TutorHub</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Welcome to TutorHub!</h1>
    @auth
    <h2><a href="{{ route('posts.create') }}">Create post</a></h2>
    @endauth

    <form id="filterForm">
        <div>
            <label for="subject">Subject:</label>
            <select id="subject" name="subject">
                <option value="">All</option>
                <option value="English">English</option>
                <option value="Latvian">Latvian</option>
                <option value="Literature">Literature</option>
                <option value="German">German</option>
                <option value="French">French</option>
                <option value="Russian">Russian</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Science">Science</option>
                <option value="History">History</option>
                <option value="Geography">Geography</option>
                <option value="Biology">Biology</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Physics">Physics</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Art">Art</option>
                <option value="Music">Music</option>
                <option value="Economics">Economics</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div>
            <label for="grades">Grades:</label>
            <select id="grades" name="grades">
            <option value="">All</option>
                <option value="1-12">1-12</option>
                <option value="1-3">1-3</option>
                <option value="1-6">1-6</option>
                <option value="4-6">4-6</option>
                <option value="7-9">7-9</option>
                <option value="7-12">7-12</option>
                <option value="10-12">10-12</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div>
            <label for="price_min">Price (min):</label>
            <input type="number" id="price_min" name="price_min" step="0.01">
        </div>

        <div>
            <label for="price_max">Price (max):</label>
            <input type="number" id="price_max" name="price_max" step="0.01">
        </div>

        <div>
            <button type="submit">Apply Filters</button>
        </div>
    </form>

    <div id="postsContainer">
        @foreach ($posts as $post)
            <div class="post">
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
            </div>
        @endforeach
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

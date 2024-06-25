<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>

        <div>
            <label for="body">Body:</label>
            <textarea id="body" name="body" required cols="80" rows="20">{{ $post->body }}</textarea>
        </div>

        <div>
            <label for="subject">Subject:</label>
            <select id="subject" name="subject" required>
                <option value="">Select subject</option>
                <option value="English" {{ $post->subject == 'English' ? 'selected' : '' }}>English</option>
                <option value="Latvian" {{ $post->subject == 'Latvian' ? 'selected' : '' }}>Latvian</option>
                <option value="Literature" {{ $post->subject == 'Literature' ? 'selected' : '' }}>Literature</option>
                <option value="German" {{ $post->subject == 'German' ? 'selected' : '' }}>German</option>
                <option value="French" {{ $post->subject == 'French' ? 'selected' : '' }}>French</option>
                <option value="Russian" {{ $post->subject == 'Russian' ? 'selected' : '' }}>Russian</option>
                <option value="Mathematics" {{ $post->subject == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                <option value="Science" {{ $post->subject == 'Science' ? 'selected' : '' }}>Science</option>
                <option value="History" {{ $post->subject == 'History' ? 'selected' : '' }}>History</option>
                <option value="Geography" {{ $post->subject == 'Geography' ? 'selected' : '' }}>Geography</option>
                <option value="Biology" {{ $post->subject == 'Biology' ? 'selected' : '' }}>Biology</option>
                <option value="Chemistry" {{ $post->subject == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                <option value="Physics" {{ $post->subject == 'Physics' ? 'selected' : '' }}>Physics</option>
                <option value="Computer Science" {{ $post->subject == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                <option value="Art" {{ $post->subject == 'Art' ? 'selected' : '' }}>Art</option>
                <option value="Music" {{ $post->subject == 'Music' ? 'selected' : '' }}>Music</option>
                <option value="Economics" {{ $post->subject == 'Economics' ? 'selected' : '' }}>Economics</option>
                <option value="Other" {{ $post->subject == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div>
            <label for="grades">Grades:</label>
            <select id="grades" name="grades" required>
                <option value="">Select grade range</option>
                <option value="1-12" {{ $post->grades == '1-12' ? 'selected' : '' }}>1-12</option>
                <option value="1-3" {{ $post->grades == '1-3' ? 'selected' : '' }}>1-3</option>
                <option value="1-6" {{ $post->grades == '1-6' ? 'selected' : '' }}>1-6</option>
                <option value="4-6" {{ $post->grades == '4-6' ? 'selected' : '' }}>4-6</option>
                <option value="7-9" {{ $post->grades == '7-9' ? 'selected' : '' }}>7-9</option>
                <option value="7-12" {{ $post->grades == '7-12' ? 'selected' : '' }}>7-12</option>
                <option value="10-12" {{ $post->grades == '10-12' ? 'selected' : '' }}>10-12</option>
                <option value="Other" {{ $post->grades == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{ $post->price }}" required>
        </div>

        <div>
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="">Select Language</option>
                <option value="ENG" {{ $post->language == 'ENG' ? 'selected' : '' }}>English</option>
                <option value="LV" {{ $post->language == 'LV' ? 'selected' : '' }}>Latvian</option>
                <option value="Other" {{ $post->language == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <p>Author: {{ $post->author }}</p>

        <button type="submit">Update</button>
    </form>
</body>
</html>

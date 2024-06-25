<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="" required>
        </div>

        <div>
            <label for="body">Body:</label>
            <textarea id="body" name="body" required cols="80" rows="20"></textarea>
        </div>

        <div>
            <label for="subject">Subject:</label>
            <select id="subject" name="subject" required>
                <option value="">Select subject</option>
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
            <select id="grades" name="grades" required>
                <option value="">Select grade range</option>
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
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="" required>
        </div>

        <div>
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="">Select Language</option>
                <option value="ENG">English</option>
                <option value="LV">Latvian</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
</body>
</html>

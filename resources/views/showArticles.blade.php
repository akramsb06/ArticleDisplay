<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Articles</title>
</head>
<body>
    <h1>All Articles</h1>

    <form method="POST" action="{{ route('deleteArticles') }}">
        {{ csrf_field() }}

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            <input type="checkbox" name="article_ids[]" value="{{ $article->id }}">
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at}}</td>
                        <td>
                            <a href="{{ route('editeArticle', $article->id) }}">Edit</a>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <button type="submit" >Delete Selected Articles</button>
    </form>

    <br>
    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Articles</title>
    <link rel="stylesheet" href="{{ asset('css/show_articles.css') }}">
</head>
<body>
    <div class="navbar">
            
            <a href="{{ url('/') }}" class="home-link">Back to Home</a>
    </div>

    <h1>All Articles</h1>

    <form method="POST" action="{{ route('deleteArticles') }}" class="delete-form">
                {{ csrf_field() }}

                
                <div class="articles-container">
                    @foreach($articles as $article)
                        <div class="article-card">
                            <input type="checkbox" name="article_ids[]" value="{{ $article->id }}" class="article-checkbox">
                            <h2>{{ $article->title }}</h2>
                            <p>{{ $article->content }}</p>
                            <p>Created At: {{ $article->created_at }}</p>
                            <p>Updated At: {{ $article->updated_at }}</p>
                            <a href="{{ route('editeArticle', $article->id) }}" class="edit-link">Edit</a>
                            <button type="submit" class="delete-button" >Delete</button>
                        </div>
                    @endforeach
                </div>
    </form>
</body>
</html>

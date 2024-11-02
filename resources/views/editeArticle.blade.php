<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="{{ asset('css/edite_article.css') }}">
</head>
<body>
    <div class="navbar">
        <!-- link to the home page -->
        <a href="{{ url('/') }}" class="home-link">Back to Home</a>

        <!-- link to the show articles page  -->
        <a href="{{ route('showArticles') }}" class="articles-link">Back to All Articles</a>
    </div>
    
    <div class="container"> 
        
        <h1>Edit Article</h1>
         
        <!-- input fields to update an article -->
        <form method="POST" action="{{ route('updateArticle', $article->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }} <!-- PUT is used for updating the article -->

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $article->title }}"><br><br>

        <label for="content">Content</label>
        <textarea id="content" name="content">{{ $article->content }}</textarea><br><br>

        <!-- button to confirm the update -->
        <button type="submit">Update</button>
        </form>

    </div>
   

    
    
</body>
</html>

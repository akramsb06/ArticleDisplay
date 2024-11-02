<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <title>Articles</title>


    </head>

    <body class="antialiased">
        
        <div class="container">

            <a href="{{ route('dashboard') }}">
                    <button type="submit" id="show_dashboard" class="account-button">My Account</button>
            </a>

            <div >

                <h1>Create an article</h1><br><br>

                <form method="post" action="{{ route('saveArticle') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <label for="article">title</label>
                    <input type="text" id="article_title" name="title" placeholder="Enter title"><br><br><br>

                    <label for="article">content</label>
                    <input type="text" id="article_content" name="content" placeholder="Enter content"><br><br><br>

                    <button type = "submit" id="create_article">save</button><br><br><br>

                </form>

                <a href="{{ route('showArticles') }}" >
                        <button type = "submit" id="show_articles">show articles</button>
                </a>

                
            </div>        

        </div>

        

       
    </body>
</html>


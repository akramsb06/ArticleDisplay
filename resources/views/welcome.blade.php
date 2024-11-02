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

            <!-- link to the dashboard page -->
            <a href="{{ route('dashboard') }}">
                    <button type="submit" id="show_dashboard" class="account-button">My Account</button>
            </a>

            <div >

                <h1>Create an article</h1>

                 <!-- input fields to save an article    -->
                <form method="post" action="{{ route('saveArticle') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <label for="article">title</label>
                    <input type="text" id="article_title" name="title" placeholder="Enter title">

                    <label for="article">content</label>
                    <input type="text" id="article_content" name="content" placeholder="Enter content">

                    <button type = "submit" id="create_article">save</button>

                </form>
                
                <!-- link to the show articles page -->
                <a href="{{ route('showArticles') }}" >
                        <button type = "submit" id="show_articles">show articles</button>
                </a>

                <!-- display a conformation message -->
                @if(session('success'))
                    <div class="alert alert-success" id= "success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    // Hide the alert after 3 seconds (3000 milliseconds)
                    setTimeout(function() {
                        const successMessage = document.getElementById('success-message');
                        if (successMessage) {
                            successMessage.style.transition = 'opacity 0.5s ease';
                            successMessage.style.opacity = '0';
                            setTimeout(() => successMessage.remove(), 500); // Remove from DOM after fade out
                        }
                    }, 3000);
                </script>


                
            </div>        

        </div>

        

       
    </body>
</html>


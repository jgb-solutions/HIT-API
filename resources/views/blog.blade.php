
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jean Gérard Bousiquot">
    <title>Haiti Info Toutan</title>

    <link rel="canonical" href="https://infotoutan.com">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
    <script data-ad-client="ca-pub-3793163111580068" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <a class="blog-header-logo text-dark" href="/">Haiti Info Toutan</a>
    </header>

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Toutes les actualités, en temps réel.</h1>
            <p class="lead my-3">Tout nouvèl ou dwe konnen yo, lè pou konnen yo, yon sèl kote. Nou pa nan manti.</p>
        </div>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">

            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">{{ $post->public_date }}</p>
                    <img src="{{ $post->image_url }}" class="img-fluid" />
                    <hr />
                   <div>{!! $post->body !!}</div>
                    <hr />
                    @if($post->ads)
                        <div>{!! $post->ads !!}</div>
                    @endif
                </div><!-- /.blog-post -->
            @endforeach

            {{ $posts->links() }}

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-4 mb-3 bg-light rounded">
                <h4 class="font-italic">À Propos de HIT</h4>
                <p>HIT est une plateforme Fondée par de jeunes Haïtiens en 2016, <br />
                dont l'objectif est d'informer ses abonnés en tout le temps, <br />
                dont son nom Haiti info Toutan,
                constituée de professionnels de l'information. <br />
                HIT se veut être un outil util pour ses lecteurs pour qui, <br />
                l'information  est d'une importance  capitale dans leur quotidien.</p>
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
    <p>&copy; HIT 2020</p>
    <p>
        Développé par
        <a href="https://jgb.solutions" style="color: #ff9800; text-decoration: none; font-weight: bold;" target="_blank" rel="noopener noreferrer">JGB Solutions</a>
    </p>
    <p>
        <a href="#">Retourner en haut</a>
    </p>
</footer>
</body>
</html>
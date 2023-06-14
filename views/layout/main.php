<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><?= \core\Settings::init()->appName; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about/news">
                            <b>About/News</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/articles">Articles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="flex-shrink-0 m-3">
    <div class="container">
        <?= $content ?>
    </div>
</main>
<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="footer-text">Place sticky footer content here.</span>
    </div>
</footer>
<script src="/js/index.js"></script>
<script src="/js/runtime.js"></script>
</body>
</html>
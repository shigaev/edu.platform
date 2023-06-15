<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column h-100">

<header>
    <div class="px-3 py-2 text-bg-dark border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <svg class="bi me-2" fill="currentColor" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="/img/bootstrap-icons#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="/" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" fill="currentColor" width="24" height="24">
                                <use xlink:href="/img/bootstrap-icons#house-door"></use>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" fill="currentColor" width="24" height="24">
                                <use xlink:href="/img/bootstrap-icons#speedometer2"></use>
                            </svg>
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/about/news" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" fill="currentColor" width="24" height="24">
                                <use xlink:href="/img/bootstrap-icons#table"></use>
                            </svg>
                            About / News
                        </a>
                    </li>
                    <li>
                        <a href="/articles" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" fill="currentColor" width="24" height="24">
                                <use xlink:href="/img/bootstrap-icons#grid"></use>
                            </svg>
                            Articles
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" fill="currentColor" width="24" height="24">
                                <use xlink:href="/img/bootstrap-icons#person-circle"></use>
                            </svg>
                            Customers
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </div>
    </div>
</header>

<main class="flex-shrink-0 m-3">
    <div class="container">
        <?= $content ?>
    </div>
</main>
<div class="container mt-auto">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-auto border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24" fill="currentColor">
                    <use xlink:href="/img/bootstrap-icons#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="/img/bootstrap-icons#twitter"></use>
                    </svg>
                </a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="/img/bootstrap-icons#instagram"></use>
                    </svg>
                </a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="/img/bootstrap-icons#facebook"></use>
                    </svg>
                </a></li>
        </ul>
    </footer>
</div>
<script src="/js/index.js"></script>
<script src="/js/runtime.js"></script>
</body>
</html>
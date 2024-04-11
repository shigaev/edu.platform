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

<div class="container-full h-100">
    <div class="admin h-100">
        <div class="admin-left">
            <ul class="menu">
                <li class="menu__item">
                    <a class="menu__link" href="<?= $this->dirSettings['basePath'] ?>">Home</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="/about">About</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="/articles">Articles</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="/about/news">
                        About / News
                    </a>
                </li>
            </ul>

        </div>
        <div class="admin-right h-100">
            <div class="admin-content h-100">
                <div class="admin-nav">
                    <a type="button" class="btn btn-primary m-2" href="<?= $this->dirSettings['frontend'] ?>"
                       target="_blank">На
                        сайт</a>
                    <a type="button" class="btn btn-warning text-dark m-2" href="/users/logout">Выйти</a>
                </div>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-auto py-3 bg-body-tertiary custom-footer">
    <div class="container">
        <span class="text-body-secondary">&copy; Education Platform from Shigaev Dmitriy. <?= date('Y') ?></span>
    </div>
</footer>

<script src="/js/index.js"></script>
<script src="/js/runtime.js"></script>
</body>
</html>
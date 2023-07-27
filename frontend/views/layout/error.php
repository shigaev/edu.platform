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
<body class="d-flex flex-column h-100" style="background-color: #eef2f6;">

<main class="w-100 m-auto d-flex justify-content-center">
    <div class="error-content">
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3" style="background-color: #eef2f6;">
    <div class="container">
        <span class="text-body-secondary">
            <?= \core\Settings::init()->appName ?> <?= date('Y') ?>
        </span>
    </div>
</footer>
</body>
</html>
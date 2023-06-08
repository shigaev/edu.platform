<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column h-100 bg-dark-subtle">

<main class="w-100 m-auto d-flex justify-content-center">
    <div class="error-content">
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-dark-subtle">
    <div class="container">
        <span class="text-body-secondary">Place sticky footer content here.</span>
    </div>
</footer>
</body>
</html>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
            <a class="link-body-emphasis" href="/">
                <i class="bi bi-house-door-fill"></i>
                <span class="visually-hidden">Home</span>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="/articles">Articles</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= $article->getTitle(); ?>
        </li>
    </ol>
</nav>
<h2><?= $article->getTitle(); ?></h2>
<p><?= $article->getContent(); ?></p>
<div class="row">
    <div class="col-md-6">
        <span class="badge rounded-pill text-bg-secondary"><?= $article->getCreatedAt(); ?></span>
    </div>
    <div class="col-md-6 text-md-end">
        <span class="badge rounded-pill text-bg-primary">Автор: <?= $article->getAuthor()->getUserName(); ?></span>
    </div>
</div>
<span><a href="/articles/<?= $article->getId(); ?>/edit">Редактировать</a></span>
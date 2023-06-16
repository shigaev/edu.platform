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
            <?php foreach ($article as $item): ?>
                <?= $item->getTitle(); ?>
            <?php endforeach; ?>
        </li>
    </ol>
</nav>

<?php foreach ($article as $item): ?>
    <h2><?= $item->getTitle(); ?></h2>
    <p><?= $item->getContent(); ?></p>
<?php endforeach; ?>
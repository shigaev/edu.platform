<?php foreach ($articles as $article): ?>
    <h4>
        <a href="/articles/<?= $article->getId(); ?>">
            <?= $article->getTitle(); ?>
        </a>
    </h4>
    <p><?= $article->getDescription(); ?></p>
<?php endforeach; ?>
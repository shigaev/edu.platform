<?php foreach ($articles as $article): ?>
    <h4>
        <a href="<?= '/articles/' . $article['id'] ?>"><?= $article['title'] ?></a>
    </h4>
    <p><?= $article['description'] ?></p>
<?php endforeach; ?>

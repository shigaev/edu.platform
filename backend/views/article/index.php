<div>
    <a href="/articles/add" type="button" class="btn btn-success">Создать статью</a>
    <hr>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Описание</th>
        <th scope="col">Автор</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <th scope="row"><?= $article->getId(); ?></th>
            <td><a href="/articles/<?= $article->getId(); ?>">
                    <?= $article->getTitle(); ?>
                </a>
            </td>
            <td>
                <?= $article->getDescription(); ?>
            </td>
            <td>
                <?= $article->getAuthor()->getUserName(); ?>
            </td>
            <td>
                <a class="mx-2" href="/articles/<?= $article->getId(); ?>/edit"><i class="bi bi-pencil-square"
                                                                                   style="color: green"
                                                                                   title="Редактировать"></i></a>
                <a class="mx-2" href="/articles/<?= $article->getId(); ?>/delete"><i class="bi bi-trash3"
                                                                                     style="color: red"
                                                                                     title="Удалить"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h4>Редактирование статьи</h4>
<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<form action="/articles/<?= $article->getId() ?>/edit" method="post" style="max-width: 600px">
    <div class="mb-3">
        <label for="title" class="form-label">Название статьи</label>
        <input name="title" value="<?= $_POST['title'] ?? $article->getTitle() ?>" class="form-control" type="text"
               id="title"
               placeholder="title"
               aria-label="title article">

        <label for="description" class="form-label">Описание статьи</label>
        <input name="description" value="<?= $_POST['description'] ?? $article->getDescription() ?>"
               class="form-control" type="text"
               id="description" placeholder="description"
               aria-label="description article">

        <label for="content" class="form-label">Текст статьи</label>
        <textarea name="content" class="form-control" id="content" rows="3">
            <?= $_POST['content'] ?? $article->getContent() ?>
        </textarea>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<h4>Add article</h4>

<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<form action="/articles/add" method="post" style="max-width: 600px">
    <div class="mb-3">
        <label for="title" class="form-label">Title article</label>
        <input name="title" value="<?= $_POST['title'] ?? '' ?>" class="form-control" type="text" id="title" placeholder="title"
               aria-label="title article">

        <label for="description" class="form-label">Description article</label>
        <input name="description" value="<?= $_POST['description'] ?? '' ?>" class="form-control" type="text" id="description" placeholder="description"
               aria-label="description article">

        <label for="content" class="form-label">Text article</label>
        <textarea name="content" class="form-control" id="content" rows="3">
            <?= $_POST['content'] ?? '' ?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
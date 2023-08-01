<h1><?= $title ?></h1>
<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<div class="center">
    <form class="custom-form" action="/users/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control"
                   type="email"
                   id="email"
                   name="email"
                   placeholder="name@example.com"
                   value="<?= $_POST['email'] ?? '' ?>"
            >
            <label for="password" class="form-label">Password</label>
            <input class="form-control"
                   type="password"
                   id="password"
                   name="password"
                   aria-labelledby="password"
                   value="<?= $_POST['password'] ?? '' ?>"
            >
        </div>
        <button type="submit" class="btn btn-success">Войти</button>
    </form>
</div>
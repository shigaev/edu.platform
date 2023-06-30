<div>
    <h1><?= $title ?></h1>
    <?php if (!empty($error)): ?>
        <div style="background-color: red;"><?= $error ?></div>
    <?php endif; ?>
    <form action="/users/register" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input class="form-control" type="text" placeholder="Username" id="username" name="username"
                   aria-label="username">

            <label for="nickname" class="form-label">Nickname</label>
            <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Nickname"
                   aria-label="nickname">

            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">

            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" aria-labelledby="password">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                special characters, or emoji.
            </div>
        </div>
        <button type="submit" class="btn btn-success">Зарегистрироваться</button>
    </form>
</div>
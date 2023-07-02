<div>

    <div class="center">
        <h1><?= $title ?></h1>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <form class="custom-form" action="/users/register" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input class="form-control"
                       type="text"
                       placeholder="Username"
                       id="username"
                       name="username"
                       aria-label="username"
                       value="<?= $_POST['username'] ?? '' ?>"
                >

                <label for="nickname" class="form-label">Nickname</label>
                <input class="form-control"
                       type="text" id="nickname"
                       name="nickname"
                       placeholder="Nickname"
                       aria-label="nickname"
                       value="<?= $_POST['nickname'] ?? '' ?>"
                >

                <label for="email" class="form-label">Email address</label>
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
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                    spaces,
                    special characters, or emoji.
                </div>
            </div>
            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
    </div>
</div>
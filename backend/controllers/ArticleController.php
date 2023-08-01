<?php

namespace backend\controllers;

use core\Controller;
use exceptions\Forbidden;
use exceptions\NotFoundException;
use exceptions\UnauthorizedException;
use frontend\models\Article;
use InvalidArgumentException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::findAll();
        $title = 'Articles | BACKEND';

        $this->view->render('article/index', [
            'title' => $title,
            'articles' => $articles
        ]);
    }

    public function view(int $id)
    {
        $article = Article::findOne($id);
        $title = 'Статья | BACKEND ' . $id;

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->render('article/view', [
            'title' => $title,
            'article' => $article,
        ]);
    }

    /**
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function edit($id)
    {
        $article = Article::findOne($id);

        if ($article) {
            $title = 'Edit | BACKEND ' . $article->getTitle();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($article === null) {
            throw new NotFoundException();
        }

        if (!empty($_POST)) {
            try {
                $article->updateArrayFrom($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->render('article/edit', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->render('article/edit', ['article' => $article, 'title' => $title]);
    }

    /**
     * @throws Forbidden
     * @throws UnauthorizedException
     */
    public function add(): void
    {
        $title = 'Add article | FRONTEND';

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getUserRole() !== 'admin') {
            throw new Forbidden('Вы не можете добавлять статьи так как у вас недостаточно прав.');
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createArrayForm($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->render('article/add', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->render('article/add', ['title' => $title]);
    }

    public function delete($id)
    {
        $title = 'Delete article | FRONTEND';
        $article = Article::findOne($id);

        if ($article != null) {
            $article->delete();
            $this->view->render('article/delete', ['id' => $id, 'title' => $title]);
        } else {
            $this->view->render('main/error', [], 404, 'error');
        }
    }
}
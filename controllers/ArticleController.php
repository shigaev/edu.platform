<?php

namespace controllers;

use core\Controller;
use core\Db;
use exceptions\Forbidden;
use exceptions\NotFoundException;
use exceptions\UnauthorizedException;
use models\Article;
use models\User;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::findAll();
        $title = 'Articles';

        $this->view->render('article/index', [
            'title' => $title,
            'articles' => $articles
        ]);
    }

    public function view(int $id)
    {
        $article = Article::findOne($id);
        $title = 'Статья' . $id;

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->render('article/view', [
            'title' => $title,
            'article' => $article,
        ]);
    }

    public function edit($id)
    {
        $article = Article::findOne($id);

        if ($article) {
            $title = 'Edit | ' . $article->getTitle();
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
            } catch (\InvalidArgumentException $e) {
                $this->view->render('articles/edit', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->render('article/edit', ['article' => $article, 'title' => $title]);
    }

    public function add(): void
    {
        $title = 'Add article';

        /*$author = User::findOne(1);
        $article = new Article();
        $article->setAuthor($author);

        $article->setTitle('Новый заголовок 3');
        $article->setContent('Новый контент статьи 3');

        $article->save();*/


        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getUserRole() !== 'admin') {
            throw new Forbidden('Вы не можете добавлять статьи так как у вас недостаточно прав.');
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createArrayForm($_POST, $this->user);
            } catch (\InvalidArgumentException $e) {
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
        $title = 'Delete article';
        $article = Article::findOne($id);

        if ($article != null) {
            $article->delete();
            $this->view->render('article/delete', ['id' => $id, 'title' => $title]);
        } else {
            $this->view->render('main/error', [], 404, 'error');
        }
    }
}
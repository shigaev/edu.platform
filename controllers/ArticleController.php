<?php

namespace controllers;

use core\Controller;
use core\Db;
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
        $title = $article->getTitle();

        $this->view->render('article/view', [
            'title' => $title,
            'article' => $article,
        ]);
    }

    public function edit($id)
    {
        $article = Article::findOne($id);
        $title = 'Edit | ' . $article->getTitle();

        /*$article->setTitle('Новый заголовок');
        $article->setContent('Новый контент статьи');*/
        $article->save();

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

        $this->view->render('article/add', [/*'article' => $article,*/ 'title' => $title]);
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
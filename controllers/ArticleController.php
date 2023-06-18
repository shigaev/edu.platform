<?php

namespace controllers;

use core\Controller;
use models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $title = 'Articles';

        $articles = Article::findAll();

        $this->view->render('article/index', ['title' => $title, 'articles' => $articles]);
    }

    public function view(int $id)
    {
        $title = 'View Article';

        $article = $this->instance->query('SELECT * FROM `article` WHERE `id` = :id', [':id' => $id], Article::class);

        if ($article === []) {
            $this->view->render('main/error', ['title' => $title], 404, 'error');
            return;
        }

        $this->view->render('article/view', ['title' => $title, 'article' => $article]);
    }
}
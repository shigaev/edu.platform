<?php

namespace controllers;

use core\Controller;
use models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::findAll();
        $title = 'Articles';

        $this->view->render('article/index', ['title' => $title, 'articles' => $articles]);
    }

    public function view(int $id)
    {
        $article = Article::findOne($id);
        $title = $article[0]->getTitle();

        if ($article === []) {
            $this->view->render('main/error', ['title' => $title], 404, 'error');
            return;
        }

        $this->view->render('article/view', ['title' => $title, 'article' => $article]);
    }
}
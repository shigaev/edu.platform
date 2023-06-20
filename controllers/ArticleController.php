<?php

namespace controllers;

use core\Controller;
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
}
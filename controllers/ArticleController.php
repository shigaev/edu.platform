<?php

namespace controllers;

use core\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $title = 'Articles';

        $articles = $this->instance->query('SELECT * FROM `article`');

        $this->view->render('article/index', ['title' => $title, 'articles' => $articles]);
    }

    public function view(int $id)
    {
        $title = 'View Article';

        $article = $this->instance->query('SELECT * FROM `article` WHERE `id` = :id', [':id' => $id]);

        if ($article === []) {
            $this->view->render('main/error', ['title' => $title], 404, 'error');
            return;
        }

        $this->view->render('article/view', ['title' => $title, 'article' => $article]);
    }
}
<?php

namespace backend\models;

use core\ActiveRecord;
use InvalidArgumentException;

class Article extends ActiveRecord
{
    protected $id;
    protected ?string $title = '';
    protected ?string $description = '';
    protected ?string $content = '';
    protected $author_id = null;
    protected ?string $created_at = null;
    protected ?string $updated_at = null;

    public static function getTableName(): string
    {
        return 'article';
    }

    /**
     * @param User $author
     * @return void
     */
    public function setAuthor(User $author): void
    {
        $this->author_id = $author->getId();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function getAuthor(): ?ActiveRecord
    {
        return User::findOne($this->author_id);
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public static function createArrayForm(array $fields, User $author): Article
    {
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['description'])) {
            throw new InvalidArgumentException('Не передано описание статьи');
        }

        if (empty($fields['content'])) {
            throw new InvalidArgumentException('Не передан контент статьи');
        }

        $article = new Article();
        $article->setAuthor($author);
        $article->setTitle($fields['title']);
        $article->setDescription($fields['description']);
        $article->setContent($fields['content']);
        $article->save();

        return $article;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function updateArrayFrom(array $fields): Article
    {
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['description'])) {
            throw new InvalidArgumentException('Не передано описание');
        }

        if (empty($fields['content'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setTitle($fields['title']);
        $this->setDescription($fields['description']);
        $this->setContent($fields['content']);
        $this->save();

        return $this;
    }
}
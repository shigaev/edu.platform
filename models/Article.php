<?php

namespace models;

use core\ActiveRecord;

class Article extends ActiveRecord
{
    protected string $title;
    protected string $description;
    protected string $content;
    protected int $author_id;
    protected string $created_at;
    protected string $updated_at;

    public static function getTableName(): string
    {
        return 'article';
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContent(): string
    {
        return $this->content;
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
}
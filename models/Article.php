<?php

namespace models;

use core\ActiveRecord;

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
}
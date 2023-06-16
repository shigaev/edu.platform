<?php

namespace models;

class Article
{
    private int $id;
    private string $title;
    private string $description;
    private string $content;
    private int $author_id;
    private string $created_at;
    private string $updated_at;

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
}
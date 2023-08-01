<?php

namespace backend\models;

class About
{
    private string $title;

    public function __set(string $property, $value)
    {
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}
<?php

class Recipe
{
    private $title;
    private $description;
    private $image;
    private $rating;
    private $id;

    public function __construct($title, $description, $image, $rating = 0, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->rating = $rating;
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getLike(): int
    {
        return $this->like;
    }

    public function setLike(int $like): void
    {
        $this->like = $like;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getRating()
    {
        return $this->rating;
    }
}
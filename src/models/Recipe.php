<?php

class Recipe
{
    private $title;
    private $description;
    private $image;
    private $rating;
    private $id;
    private $cookTime;
    private $servingSize;
    private $nutrition;
    private $instructions;
    private $ingredients;

    public function __construct($title, $description, $image, $cookTime, $servingSize, $nutrition, $instructions, $ingredients, $rating = 0, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->cookTime = $cookTime;
        $this->servingSize = $servingSize;
        $this->nutrition = $nutrition;
        $this->instructions = $instructions;
        $this->ingredients = $ingredients;
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

    public function getCookTime()
    {
        return $this->cookTime;
    }

    public function setCookTime($cookTime): void
    {
        $this->cookTime = $cookTime;
    }

    public function getServingSize()
    {
        return $this->servingSize;
    }

    public function setServingSize($servingSize)
    {
        $this->servingSize = $servingSize;
    }

    public function getNutrition()
    {
        return $this->nutrition;
    }

    public function setNutrition($nutrition): void
    {
        $this->nutrition = $nutrition;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
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
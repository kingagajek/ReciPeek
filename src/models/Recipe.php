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
    private $difficulty;
    private $nutrition;
    private $instructions;
    private $ingredients;

    public function __construct($title, $description, $image, $cookTime, $servingSize, $difficulty, $nutrition, $instructions, $ingredients, $rating = 0, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->cookTime = $cookTime;
        $this->servingSize = $servingSize;
        $this->difficulty = $difficulty;
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

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function setNutrition(Nutrition $nutrition): void
    {
        $this->nutrition = $nutrition;
    }

    public function getNutrition(): Nutrition
    {
        return $this->nutrition;
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

    public function getCalculatedRating()
    {
        $recipe_rating_array = $this->rating;
        $recipe_rating_sum = 0;
        $recipe_rating_count = 0;

        if ($recipe_rating_array) {
            $recipe_rating_array = unserialize($recipe_rating_array);

            foreach ($recipe_rating_array as $rating => $rating_count) {
                $recipe_rating_sum += $rating * $rating_count;
                $recipe_rating_count += $rating_count;
            }

            $recipe_rating = round($recipe_rating_sum / $recipe_rating_count, 2);
        } else {
            $recipe_rating = 0;
        }
        return ["rating" => $recipe_rating, "rating_count" => $recipe_rating_count];
    }
}
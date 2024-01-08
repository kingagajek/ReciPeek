<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';
class RecipeRepository extends Repository
{
    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipe
s WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            return null;
        }

        return new Recipe (
            $recipe['title'],
            $recipe['description'],
            $recipe['image']
        );
    }

    public function addRecipe(Recipe $recipe): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "recipes" (title, description, image, created_at)
            VALUES (?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getImage(),
            $date->format('Y-m-d'),
//            $assignedById
        ]);
    }

    public function getRecipes(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes ORDER BY id;
        ');
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $result[] = new Recipe(
                $recipe['title'],
                $recipe['description'],
                $recipe['image'],
                $recipe['rating'],
                $recipe['id']
            );
        }

        return $result;
    }

    public function getRecipeByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rate(int $id, int $rating) {
        $select_stmt = $this->database->connect()->prepare('
            SELECT rating FROM recipes WHERE id = '.$id.'
         ');

        $select_stmt->execute();
        $current_ratings = $select_stmt->fetch(PDO::FETCH_ASSOC)['rating'];

        if (!$current_ratings) {
            $new_ratings = array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            );
        } else {
            $new_ratings = unserialize($current_ratings);
        }

        if (array_key_exists($rating, $new_ratings)) $new_ratings[$rating] += 1;

        $stmt = $this->database->connect()->prepare("
            UPDATE recipes SET rating = '".serialize($new_ratings)."' WHERE id = ".$id."
         ");
        $stmt->execute();

        return $new_ratings;
    }
}
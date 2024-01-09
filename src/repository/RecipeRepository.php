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
            $recipe['image'],
            $recipe['cook_time'],
            $recipe['serving_size'],
            $recipe['rating'],
            $recipe['id']
        );
    }

    public function addRecipe(Recipe $recipe): void
    {
        $date = new DateTime();
        $db = $this->database->connect();
        $db->beginTransaction();

        try {
            $stmt = $db->prepare('
                INSERT INTO "recipes" (title, description, image, cook_time, serving_size, created_at)
                VALUES (?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([
                $recipe->getTitle(),
                $recipe->getDescription(),
                $recipe->getImage(),
                $recipe->getCookTime(),
                $recipe->getServingSize(),
                $date->format('Y-m-d'),
            ]);
            $recipeId = $db->lastInsertId();

            $stmt = $db->prepare('
                INSERT INTO "nutrition" (id_recipe, calories, fat, saturated_fat, carbohydrates, sugars, fiber, protein, salt)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $nutrition = $recipe->getNutrition();
            $stmt->execute([
                $recipeId,
                $nutrition['calories'],
                $nutrition['fat'],
                $nutrition['saturated_fat'],
                $nutrition['carbohydrates'],
                $nutrition['sugars'],
                $nutrition['fiber'],
                $nutrition['protein'],
                $nutrition['salt'],
            ]);

            foreach ($recipe->getInstructions() as $instruction) {
                $stmt = $db->prepare('
                    INSERT INTO "instructions" (id_recipe, step)
                    VALUES (?, ?)
                ');
                $stmt->execute([
                    $recipeId,
                    $instruction,
                ]);
            }

            foreach ($recipe->getIngredients() as $ingredient) {
                $stmt = $db->prepare('
                    SELECT id FROM ingredients WHERE ingredient_name = :ingredient_name
                ');
                $stmt->execute([
                    ':ingredient_name' => $ingredient['name']
                ]);

                $existingIngredient = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($existingIngredient) {
                    $ingredientId = $existingIngredient['id'];
                } else {
                    $stmt = $db->prepare('
                        INSERT INTO ingredients (ingredient_name) VALUES (:ingredient_name)
                    ');
                    $stmt->execute([
                        ':ingredient_name' => $ingredient['name']
                    ]);
                    $ingredientId = $db->lastInsertId();
                }

                // Insert into recipes_ingredients
                $stmt = $db->prepare('
                    INSERT INTO recipes_ingredients (id_recipe, id_ingredient, quantity, measurement)
                    VALUES (:id_recipe, :id_ingredient, :quantity, :measurement)
                ');
                $stmt->execute([
                    ':id_recipe' => $recipeId,
                    ':id_ingredient' => $ingredientId,
                    ':quantity' => $ingredient['quantity'],
                    ':measurement' => $ingredient['measurement']
                ]);
            }

            $db->commit();
        } catch (Exception $e) {
            $db->rollBack();
            throw $e;
        }
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
                $recipe['cook_time'],
                $recipe['serving_size'],
                NULL,
                NULL,
                NULL,
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
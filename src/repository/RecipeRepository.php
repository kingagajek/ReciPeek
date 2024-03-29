<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';
require_once __DIR__ . '/../models/Nutrition.php';
class RecipeRepository extends Repository
{
    public function addRecipe(Recipe $recipe): void
    {
        $date = new DateTime();
        $db = $this->database->connect();
        $db->beginTransaction();

        try {
            $stmt = $db->prepare('
                INSERT INTO "recipes" (title, description, image, cook_time, serving_size, id_difficulty, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ');

            $stmt->execute([
                $recipe->getTitle(),
                $recipe->getDescription(),
                $recipe->getImage(),
                $recipe->getCookTime(),
                $recipe->getServingSize(),
                $recipe->getDifficulty(),
                $date->format('Y-m-d'),
            ]);
            $recipeId = $db->lastInsertId();

            $nutrition = $recipe->getNutrition();

            $stmt = $db->prepare('
                INSERT INTO nutrition (id_recipe, calories, fat, saturated_fat, carbohydrates, sugars, fiber, protein, salt)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');

            $stmt->execute([
                $recipeId,
                $nutrition->getCalories(),
                $nutrition->getFat(),
                $nutrition->getSaturatedFat(),
                $nutrition->getCarbohydrates(),
                $nutrition->getSugars(),
                $nutrition->getFiber(),
                $nutrition->getProtein(),
                $nutrition->getSalt(),
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


    public function getRecipe(int $id): ?Recipe
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);


            // Fetch nutrition
        $stmt = $this->database->connect()->prepare('
            SELECT r.*, n.calories, n.fat, n.saturated_fat, n.carbohydrates, n.sugars, n.fiber, n.protein, n.salt
            FROM recipes r
            LEFT JOIN nutrition n ON r.id = n.id_recipe
            WHERE r.id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$recipeData) {
            return null;
        }

        $nutrition = new Nutrition(
            $recipeData['calories'],
            $recipeData['fat'],
            $recipeData['saturated_fat'],
            $recipeData['carbohydrates'],
            $recipeData['sugars'],
            $recipeData['fiber'],
            $recipeData['protein'],
            $recipeData['salt']
        );

            $instructionsStmt = $this->database->connect()->prepare('
            SELECT step FROM instructions WHERE id_recipe = :id_recipe
        ');
            $instructionsStmt->bindParam(':id_recipe', $recipe['id'], PDO::PARAM_INT);
            $instructionsStmt->execute();
            $instructions = $instructionsStmt->fetchAll(PDO::FETCH_COLUMN, 0);

            $ingredientsStmt = $this->database->connect()->prepare('
            SELECT i.ingredient_name, ri.quantity, ri.measurement 
            FROM recipes_ingredients ri
            JOIN ingredients i ON ri.id_ingredient = i.id
            WHERE ri.id_recipe = :id_recipe
        ');
            $ingredientsStmt->bindParam(':id_recipe', $recipe['id'], PDO::PARAM_INT);
            $ingredientsStmt->execute();
            $ingredients = $ingredientsStmt->fetchAll(PDO::FETCH_ASSOC);

            $difficultyStmt = $this->database->connect()->prepare('
                SELECT level FROM difficulty WHERE id = :id_difficulty
            ');
            $difficultyStmt->bindParam(':id_difficulty', $recipe['id_difficulty'], PDO::PARAM_INT);
            $difficultyStmt->execute();
            $difficulty = $difficultyStmt->fetch(PDO::FETCH_ASSOC);

            return new Recipe(
                $recipe['title'],
                $recipe['description'],
                $recipe['image'],
                $recipe['cook_time'],
                $recipe['serving_size'],
                $difficulty['level'],
                $nutrition,
                $instructions,
                $ingredients, //przekazywac tablice ingredients
                $recipe['rating'],
                $recipe['id']
            );
    }

    public function getRecipeByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
        SELECT recipes.*, difficulty.level 
        FROM recipes 
        JOIN difficulty ON recipes.id_difficulty = difficulty.id 
        WHERE LOWER(recipes.title) LIKE :search OR LOWER(recipes.description) LIKE :search
    ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as &$result) {
            if (empty($result['rating'])) continue;

            $recipe = new Recipe(
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $result['rating'],
            );

            $recipeCalculatedRating = $recipe->getCalculatedRating();
            $result['calculatedRating'] = $recipeCalculatedRating['rating'];
            $result['ratingCount'] = $recipeCalculatedRating['rating_count'];
        }

        return $results;
    }

    public function getDifficultyNameById(int $id)
    {
        $difficultyStmt = $this->database->connect()->prepare('
            SELECT level FROM difficulty WHERE id = :id 
        ');
        $difficultyStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $difficultyStmt->execute();

        return $difficultyStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rate(int $id, int $rating, string $email) {
        $get_user_id = $this->database->connect()->prepare("
            SELECT id FROM users WHERE email = '".$email."'
         ");

        $get_user_id->execute();
        $user_id = $get_user_id->fetch(PDO::FETCH_ASSOC);

        $select_stmt = $this->database->connect()->prepare('
            SELECT rating, ids_of_users_who_rated FROM recipes WHERE id = '.$id.'
         ');

        $select_stmt->execute();
        $result = $select_stmt->fetch(PDO::FETCH_ASSOC);
        $ids_of_users_who_rated = $result['ids_of_users_who_rated'];

        if (!empty($ids_of_users_who_rated)) {
            $ids_of_users_who_rated_array = unserialize($ids_of_users_who_rated);

            if (in_array($user_id, $ids_of_users_who_rated_array)) return ['error_message' => 'You have already rated this recipe.'];
        }
        else {
            $ids_of_users_who_rated_array = [];
        }

        $current_ratings = $result['rating'];

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

        $ids_of_users_who_rated_array[] = $user_id;

        $stmt = $this->database->connect()->prepare("
            UPDATE recipes SET rating = '".serialize($new_ratings)."', ids_of_users_who_rated = '".serialize($ids_of_users_who_rated_array)."' WHERE id = ".$id."
         ");
        $stmt->execute();

        return $new_ratings;
    }

    public function getMostRecentRecipes($limit = 10): array {
        $stmt = $this->database->connect()->prepare('
            SELECT recipes.*, difficulty.level 
            FROM recipes 
            JOIN difficulty ON recipes.id_difficulty = difficulty.id 
            ORDER BY created_at DESC LIMIT :limit;
        ');
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as &$result) {
            if (empty($result['rating'])) continue;

            $recipe = new Recipe(
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $result['rating']
            );

            $recipeCalculatedRating = $recipe->getCalculatedRating();
            $result['calculatedRating'] = $recipeCalculatedRating['rating'];
            $result['ratingCount'] = $recipeCalculatedRating['rating_count'];
        }

        return $results;
    }

    public function getRecommendedRecipes($limit = 10): array {
        $stmt = $this->database->connect()->prepare('
            SELECT recipes.*, difficulty.level 
            FROM recipes 
            JOIN difficulty ON recipes.id_difficulty = difficulty.id 
            ORDER BY views DESC LIMIT :limit;
        ');
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as &$result) {
            if (empty($result['rating'])) continue;

            $recipe = new Recipe(
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $result['rating']
            );

            $recipeCalculatedRating = $recipe->getCalculatedRating();
            $result['calculatedRating'] = $recipeCalculatedRating['rating'];
            $result['ratingCount'] = $recipeCalculatedRating['rating_count'];
        }

        return $results;
    }

    public function incrementRecipeViews($recipeId) {
        $stmt = $this->database->connect()->prepare('
        SELECT increment_recipe_views(:id);
    ');
        $stmt->bindParam(':id', $recipeId, PDO::PARAM_INT);
        $stmt->execute();
    }

}
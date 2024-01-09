<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../repository/RecipeRepository.php';

class RecipeController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $recipeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }

    public function recipe() {
        $recipes = $this->recipeRepository->getRecipes();
        $this->render('recipe', ['recipes' => $recipes]);
    }

    public function addRecipe()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['image']['name']
            );

            $nutrition = [
                "calories" => $_POST['calories'],
                "fat" => $_POST['fat'],
                "saturated_fat" => $_POST['saturated_fat'],
                "carbohydrates" => $_POST['carbohydrates'],
                "sugars" => $_POST['sugars'],
                "fiber" => $_POST['fiber'],
                "protein" => $_POST['protein'],
                "salt" => $_POST['salt']
            ];
            $ingredients = [];
            foreach ($_POST['ingredients'] as $index => $ingredientName) {
                if (!empty($ingredientName) && !empty($_POST['quantities'][$index]) && !empty($_POST['measurements'][$index])) {
                    $ingredients[] = [
                        'name' => $ingredientName,
                        'quantity' => $_POST['quantities'][$index],
                        'measurement' => $_POST['measurements'][$index]
                    ];
                }
            }
            // TODO create new recipe object and save it in database
            $recipe = new Recipe($_POST['title'], $_POST['description'], $_FILES['image']['name'], $_POST['cook_time'], $_POST['serving_size'], $nutrition, $_POST['instructions'], $ingredients);
            $this->recipeRepository->addRecipe($recipe);

            return $this->render('recipe', [
                'messages' => $this->message,
                'recipes' => $this->recipeRepository->getRecipes()
            ]);
        }
        return $this->render('add-recipe', ['messages' => $this->message]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->recipeRepository->getRecipeByTitle($decoded['search']));
        }
    }

    public function rate() {
        $id = $_GET['id'];
        $rating = $_GET['rating'];

        echo json_encode($this->recipeRepository->rate($id, $rating));
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
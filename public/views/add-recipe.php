<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\recipe.css">
    <link rel="stylesheet" href="public\styles\header.css">
    <script type="text/javascript" src="./public/scripts/redirect.js" defer></script>
    <script type="text/javascript" src="./public/scripts/dynamic-form.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek Add Recipe</title>
</head>
<body>
    <header>
        <a href="/home"><img class="logo" src="public\images\logo.svg" alt="logo"></a>
        <div class="search-container">
            <img class="search-icon" src="public\images\search.svg" alt="search-icon">
            <input class="search" type="search" id="search" name="search" placeholder="Search recipe">
            <div class="dropdown-container">
                <select id="search-type" name="search-type">
                    <option value="by_recipe">By recipe</option>
                    <option value="by_ingredients">By ingredients</option>
                </select>
            </div>
        </div>
        <div class="header-buttons">
            <a href="/editProfile"><img class="profile" src="public\images\profile.svg" alt="profile"></a>
            <a href="/addRecipe"><img class="add-recipe-icon" src="public\images\plus.svg" alt="plus"></a>
        </div>
    </header>

    <form class="main-container" method="post" ENCTYPE="multipart/form-data">
        <?php if(isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
            }
        }
        ?>
        <!-- Step 1: Recipe Information -->
        <div class="main-info">
            <div class="image-upload-container">
                <div class="image-preview-container">

                </div>
                <label for="file-upload" class="image-upload-label">
                    <div class="image-upload-plus">+</div>
                    <div class="image-upload-text">Upload image</div>
                </label>
                <input id="file-upload" type="file" name="image" accept="image/*" style="display: none;"/>
            </div>
            <div class="main-info-text">
                <input class="recipe-title" type="text" name="title" placeholder="Recipe name..." required>
                <div class="recipe-info">
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                        <input type="number" name="cook_time" placeholder="Total time(mins)..." min="1" required>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                        <select type="text" name="difficulty" placeholder="Difficulty..." required>
                            <option value="">Select difficulty...</option>
                            <option value="1">Easy</option>
                            <option value="2">More effort</option>
                            <option value="3">A challenge</option>
                        </select>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\portion.svg" alt="portion-icon">
                        <input type="number" name="serving_size" placeholder="Portions..." min="1">
                    </div>
                </div>
                <textarea class="recipe-description" name="description" placeholder="Add recipe description..." required></textarea>

                <div class="nutrition-info">
                    <h3>Nutrition (optional):</h3>
                    <div class="nutrition-details">
                        <input type="number" name="calories" placeholder="kcal..." min="0">
                        <input type="number" name="fat" placeholder="fat (g)..." min="0" step="0.1">
                        <input type="number" name="saturated_fat" placeholder="saturates (g)..." min="0" step="0.1">
                        <input type="number" name="carbohydrates" placeholder="carbs (g)..." min="0" step="0.1">
                        <input type="number" name="sugars" placeholder="sugars (g)..." min="0" step="0.1">
                        <input type="number" name="fiber" placeholder="fiber (g)..." min="0" step="0.1">
                        <input type="number" name="protein" placeholder="protein (g)..." min="0" step="0.1">
                        <input type="number" name="salt" placeholder="salt (g)..." min="0" step="0.01">
                    </div>
                </div>
            </div>
        </div>

        <div class="recipe-content">
            <!-- Step 2: Ingredients -->
            <div class="ingredients">
                <h2>Ingredients</h2>
                <div id="ingredients-list">
                    <div class="ingredient-item">
                        <input type="text" name="ingredients[]" placeholder="Ingredient..." class="ingredient-input">
                        <input type="number" name="quantities[]" placeholder="Quantity..." class="ingredient-quantity" min="0" step="any">
                        <input type="text" name="measurements[]" placeholder="Measurement..." class="ingredient-measurement">
                    </div>
                </div>
                <button type="button" id="add-ingredient-btn">Add Ingredient</button>
            </div>

            <!-- Step 3: Instructions -->
            <div class="instructions">
                <h2>Instructions</h2>
                <div id="instructions-list">

                </div>
                <button type="button" id="add-instruction-btn">Add Step</button>
            </div>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="submit-button button-bg-gradient">Submit Recipe</button>
    </form>
</body>
</html>
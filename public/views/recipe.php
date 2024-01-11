<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\recipe.css">
    <script type="text/javascript" src="./public/scripts/search.js" defer></script>
    <script type="text/javascript" src="./public/scripts/statistics.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek result</title>
</head>
<body>
    <header>
        <a href="/home"><img class="logo" src="public\images\logo.svg" alt="logo"></a>
        <div class="search-container">
            <img class="search-icon" src="public\images\search.svg" alt="search-icon">
            <input class="search" type="search" id="search" name="search" placeholder="Search recipe">
        </div>
        <div class="header-buttons">
            <img class="profile" src="public\images\profile.svg" alt="profile">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="main-info">
            <img class="recipe-picture" src="public/uploads/<?= $recipe->getImage() ?>" alt="Chicken wrap">
            <div class="main-info-text">
                <h1><?= $recipe->getTitle() ?></h1>
                <div class="recipe-rating" data-recipe-id="<?= $recipe->getId();?>">
                        <?php
                        $recipe_rating_array = $recipe->getRating();
                        $recipe_rating_sum = 0;
                        $recipe_rating_count = 0;

                        if ($recipe_rating_array) {
                            $recipe_rating_array = unserialize($recipe_rating_array);

                            foreach ($recipe_rating_array as $rating => $rating_count) {
                                $recipe_rating_sum += $rating * $rating_count;
                                $recipe_rating_count += $rating_count;
                            }

                            $recipe_rating = $recipe_rating_sum / $recipe_rating_count;
                        } else {
                            $recipe_rating = 0;
                        }
                    ?>
                    <div class="recipe-rating-stars">
                        <div class="recipe-rating-stars-empty">
                            <img class="star-icon rate-button" src="public\images\star.png" alt="star-icon" data-rating="1">
                            <img class="star-icon rate-button" src="public\images\star.png" alt="star-icon" data-rating="2">
                            <img class="star-icon rate-button" src="public\images\star.png" alt="star-icon" data-rating="3">
                            <img class="star-icon rate-button" src="public\images\star.png" alt="star-icon" data-rating="4">
                            <img class="star-icon rate-button" src="public\images\star.png" alt="star-icon" data-rating="5">
                        </div>
                        <div class="recipe-rating-stars-full" style="width: <?= $recipe_rating / 5 * 100; ?>%">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                        </div>
                    </div>
                    <span class="recipe-rating-summary">
                        <?= round($recipe_rating, 2).' ('.$recipe_rating_count.' ratings)'; ?>
                    </span>
                </div>
                <div class="recipe-info">
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                        <span> 30 mins</span>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                        <span>easy</span>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\portion.svg" alt="portion-icon">
                        <span>2 portion</span>
                    </div>
                </div>
                <p class="recipe-description">
                    <?= $recipe->getDescription() ?>
                </p>
                <div class="nutrition-info">
                    <h3>Nutrition:</h3>
                    <div class="nutrition-details">
                        <div class="nutrition-item">
                            <span class="nutrition-label">kcal</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getCalories() ?></span>
<!--                            $recipe->getNutrition()->getCalories() masz stowrzyc modele Nutrition itd -->
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fat</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getFat() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">saturates</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getSaturatedFat() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">carbs</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getCarbohydrates() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">sugars</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getSugars() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fibre</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getFiber() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">protein</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getProtein() ?></span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">salt</span>
                            <span class="nutrition-value"><?= $recipe->getNutrition()->getSalt() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="recipe-content">
            <div class="ingredients">
                <h2>Ingredients</h2>
                <form class="ingredients-list">
                    <?php foreach ($recipe->getIngredients() as $ingredient):
                        $ingredientSting = $ingredient['quantity']." ".$ingredient['measurement']." ".$ingredient['ingredient_name']
                        ?>
                    <label class="ingredient-item">
                        <input type="checkbox" name="ingredient" value="<?= $ingredientSting ?>">
                        <span><?= $ingredientSting ?></span>
                    </label>
                    <?php endforeach; ?>
                </form>
            </div>


            <div class="instructions">
                <h2>Instructions</h2>
                <ol class="instruction-list">
                    <?php foreach ($recipe->getInstructions() as $instruction): ?>
                    <li><?= $instruction ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</body>

<template id="recipe-template">
    <div class="main-container">
        <div class="main-info">
            <img class="recipe-picture" src="public/uploads/" alt="Chicken wrap">
            <div class="main-info-text">
                <h1>Title</h1>
                <div class="recipe-rating">
                    <img class="star-icon" src="public\images\star.png" alt="star-icon">
                    <span>58 ratings</span>
                </div>
                <div class="recipe-info">
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                        <span> 30 mins</span>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                        <span>easy</span>
                    </div>
                    <div class="recipe-info-item">
                        <img class="recipe-info-icon" src="public\images\portion.svg" alt="portion-icon">
                        <span>2 portion</span>
                    </div>
                </div>
                <p class="recipe-description">
                    Description
                </p>
                <div class="nutrition-info">
                    <h3>Nutrition:</h3>
                    <div class="nutrition-details">
                        <div class="nutrition-item">
                            <span class="nutrition-label">kcal</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fat</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">saturates</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">carbs</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">sugars</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fibre</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">protein</span>
                            <span class="nutrition-value">0</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">salt</span>
                            <span class="nutrition-value">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="recipe-content">
            <div class="ingredients">
                <h2>Ingredients</h2>
                <form class="ingredients-list">
                    <label class="ingredient-item">
                        <input type="checkbox" name="ingredient" value="400g graham crackers">
                        <span>400g graham crackers</span>
                    </label>
                    <label class="ingredient-item">
                        <input type="checkbox" name="ingredient" value="150g unsalted butter, melted">
                        <span>150g unsalted butter, melted</span>
                    </label>
                    <!-- Add other ingredients following the same pattern -->
                    ...
                </form>
            </div>

            <div class="instructions">
                <h2>Instructions</h2>
                <ol class="instruction-list">
                    <li>Preheat your oven to 180°C (350°F) and line a baking tray with parchment paper.</li>
                    <li>In a large bowl, combine the flour, sugar, baking powder, and a pinch of salt.</li>
                    <li>Cut in the butter until the mixture resembles coarse crumbs.</li>
                    <!-- Repeat for all steps -->
                    ...
                </ol>
            </div>
        </div>
    </div>
</template>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="src\styles\global.css">
    <link rel="stylesheet" href="src\styles\recipe.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek result</title>
</head>
<body>
    <header>
        <img class="logo" src="src\images\logo.svg" alt="logo">
        <div class="search-container">
            <img class="search-icon" src="src\images\search.svg" alt="search-icon">
            <input class="search" type="search" id="search" name="search" placeholder="Search recipe">
        </div>
        <div class="header-buttons">
            <img class="profile" src="src\images\profile.svg" alt="profile">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="main-info">
            <img class="recipe-picture" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
            <div class="main-info-text">
                <h1>Chicken wrap</h1>
                <div class="recipe-rating">
                    <img class="star-icon" src="src\images\star.png" alt="star-icon">
                    <span>58 ratings</span>
                </div>
                <div class="recipe-info">
                    <div class="time-info">
                        <img class="recipe-info-icon" src="src\images\time.svg" alt="time-icon">
                        <span> 30 mins</span>
                    </div>
                    <div class="difficulty-info">
                        <img class="recipe-info-icon" src="src\images\difficulty.svg" alt="difficulty-icon">
                        <span>easy</span>
                    </div>
                    <div class="portion-info">
                        <img class="recipe-info-icon" src="src\images\portion.svg" alt="portion-icon">
                        <span>2 portion</span>
                    </div>
                </div>
                <p class="recipe-description">
                    Marinate chicken in yogurt, lemon and allspice before char-grilling and wrapping in flatbread with salad for a light and delicious midweek meal
                </p>
                <div class="nutrition-info">
                    <h3>Nutrition:</h3>
                    <div class="nutrition-details">
                        <div class="nutrition-item">
                            <span class="nutrition-label">kcal</span>
                            <span class="nutrition-value">468</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fat</span>
                            <span class="nutrition-value">13g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">saturates</span>
                            <span class="nutrition-value">4g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">carbs</span>
                            <span class="nutrition-value">42g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">sugars</span>
                            <span class="nutrition-value">8g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">fibre</span>
                            <span class="nutrition-value">4g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">protein</span>
                            <span class="nutrition-value">42g</span>
                        </div>
                        <div class="nutrition-item">
                            <span class="nutrition-label">salt</span>
                            <span class="nutrition-value">0.8g</span>
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
</body>
</html>
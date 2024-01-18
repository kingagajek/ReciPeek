<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\result.css">
    <link rel="stylesheet" href="public\styles\header.css">
    <script type="text/javascript" src="./public/scripts/search.js" defer></script>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek Result</title>
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

    <div class="main-container">
        <div class="option-buttons">
            <select class="sort-button" name="sort" id="sort">
                <option value="rating-DESC">Rating: highest to lowest</option>
                <option value="rating-ASC">Rating: lowest to highest</option>
                <option value="time-DESC">Preparation time: highest to lowest</option>
                <option value="time-ASC">Preparation time: lowest to highest</option>
                <option value="ingredients-DESC" style="display: none">Total ingredients: highest to lowest</option>
                <option value="ingredients-ASC" style="display: none">Total ingredients: lowest to highest</option>
                <option value="difficulty-DESC">Difficulty: highest to lowest</option>
                <option value="difficulty-ASC">Difficulty: lowest to highest</option>
            </select>

            <button class="filter-button" id=filter-button>Filters</button>

            <button class="ingredients-button" id=ingredients-button style="display:none;">Your ingredients</button>
            <div class="ingredients-menu" id="ingredients-menu" style="display:none;">

            </div>

        </div>
        <div class="filter-menu" id="filter-menu">
            <div class="meal-type" style="display: none">
                <button>Meal Type</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="breakfast">Breakfast</label>
                        <input type="checkbox" id="breakfast" name="breakfast">
                    </div>
                    <div class="filter-option">
                        <label for="brunch">Brunch</label>
                        <input type="checkbox" id="brunch" name="brunch">
                    </div>
                    <div class="filter-option">
                        <label for="lunch">Lunch</label>
                        <input type="checkbox" id="lunch" name="lunch">
                    </div>
                    <div class="filter-option">
                        <label for="dinner">Dinner</label>
                        <input type="checkbox" id="dinner" name="dinner">
                    </div>
                    <div class="filter-option">
                        <label for="dessert">Dessert</label>
                        <input type="checkbox" id="dessert" name="dessert">
                    </div>
                    <div class="filter-option">
                        <label for="supper">Supper</label>
                        <input type="checkbox" id="supper" name="supper">
                    </div>
                    <div class="filter-option">
                        <label for="snack">Snack</label>
                        <input type="checkbox" id="snack" name="snack">
                    </div>
                </div>
            </div>

            <div class="total-time filter-select">
                <button>Total time</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="under-15m">Under 15 minutes</label>
                        <input type="checkbox" id="under-15m" name="time" value="0-15">
                    </div>
                    <div class="filter-option">
                        <label for="under-30m">16 - 30 minutes</label>
                        <input type="checkbox" id="under-30m" name="time" value="16-30">
                    </div>
                    <div class="filter-option">
                        <label for="under-45m">31 - 45 minutes</label>
                        <input type="checkbox" id="under-45m" name="time" value="31-45">
                    </div>
                    <div class="filter-option">
                        <label for="under-1h">46 - 60 minutes</label>
                        <input type="checkbox" id="under-1h" name="time" value="46-60">
                    </div>
                    <div class="filter-option">
                        <label for="more-than-1h">1 hour or more</label>
                        <input type="checkbox" id="more-than-1h" name="time" value="+60">
                    </div>
                </div>
            </div>

            <div class="difficulty filter-select">
                <button>Difficulty</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="easy">Easy</label>
                        <input type="checkbox" id="easy" name="difficulty" value="1">
                    </div>
                    <div class="filter-option">
                        <label for="more-effort">More effort</label>
                        <input type="checkbox" id="more-effort" name="difficulty" value="2">
                    </div>
                    <div class="filter-option">
                        <label for="challenge">A challenge</label>
                        <input type="checkbox" id="challenge" name="difficulty" value="3">
                    </div>
                </div>
            </div>

            <div class="ratings filter-select">
                <button>Ratings</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="1-star">1 Star</label>
                        <input type="checkbox" id="1-star" name="rating" value="1-1.99">
                    </div>
                    <div class="filter-option">
                        <label for="2-star">2 Star</label>
                        <input type="checkbox" id="2-star" name="rating" value="2-2.99">
                    </div>
                    <div class="filter-option">
                        <label for="3-star">3 Star</label>
                        <input type="checkbox" id="3-star" name="rating" value="3-3.99">
                    </div>
                    <div class="filter-option">
                        <label for="4-star">4 Star</label>
                        <input type="checkbox" id="4-star" name="rating" value="4-4.99">
                    </div>
                    <div class="filter-option">
                        <label for="5-star">5 Star</label>
                        <input type="checkbox" id="5-star" name="rating" value="5">
                    </div>
                </div>
            </div>

            <div class="additional-ingredients" style="display: none">
                <button>Number of additional ingredients</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="1-ingredient">1 ingredient</label>
                        <input type="checkbox" id="1-ingredient" name="additional-ingredients[]" value="1">
                    </div>
                    <div class="filter-option">
                        <label for="2-ingredient">2 ingredient</label>
                        <input type="checkbox" id="2-ingredient" name="additional-ingredients[]" value="2">
                    </div>
                    <div class="filter-option">
                        <label for="3-ingredient">3 ingredient</label>
                        <input type="checkbox" id="3-ingredient" name="additional-ingredients[]" value="3">
                    </div>
                    <div class="filter-option">
                        <label for="4-ingredient">4 ingredient</label>
                        <input type="checkbox" id="4-ingredient" name="additional-ingredients[]" value="4">
                    </div>
                    <div class="filter-option">
                        <label for="5-ingredient">+5 ingredients</label>
                        <input type="checkbox" id="5-ingredient" name="additional-ingredients[]" value="+5">
                    </div>
                </div>
            </div>

            <div class="diet" style="display: none">
                <button>Diet</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="vegetarian">Vegetarian</label>
                        <input type="checkbox" id="vegetarian" name="diet[]" value="vegetarian">
                    </div>
                    <div class="filter-option">
                        <label for="gluten-free">Gluten-free</label>
                        <input type="checkbox" id="gluten-free" name="diet[]" value="gluten-free">
                    </div>
                    <div class="filter-option">
                        <label for="vegan">Vegan</label>
                        <input type="checkbox" id="vegan" name="diet[]" value="vegan">
                    </div>
                    <div class="filter-option">
                        <label for="dairy-free">Dairy-free</label>
                        <input type="checkbox" id="dairy-free" name="diet[]" value="dairy-free">
                    </div>
                    <div class="filter-option">
                        <label for="nut-free">Nut-free</label>
                        <input type="checkbox" id="nut-free" name="diet[]" value="nut-free">
                    </div>
                </div>
            </div>

            <div class="cuisine" style="display: none">
                <button>Cuisine</button>
                <div class="filter-options">
                    <div class="filter-option">
                        <label for="asian">Asian</label>
                        <input type="checkbox" id="asian" name="cuisine[]" value="asian">
                    </div>
                    <div class="filter-option">
                        <label for="chinese">Chinese</label>
                        <input type="checkbox" id="chinese" name="cuisine[]" value="chinese">
                    </div>
                    <div class="filter-option">
                        <label for="italian">Italian</label>
                        <input type="checkbox" id="italian" name="cuisine[]" value="italian">
                    </div>
                    <div class="filter-option">
                        <label for="japanese">Japanese</label>
                        <input type="checkbox" id="japanese" name="cuisine[]" value="japanese">
                    </div>
                    <div class="filter-option">
                        <label for="mexican">Mexican</label>
                        <input type="checkbox" id="mexican" name="cuisine[]" value="mexican">
                    </div>
                    <div class="filter-option">
                        <label for="polish">Polish</label>
                        <input type="checkbox" id="polish" name="cuisine[]" value="polish">
                    </div>
                    <div class="filter-option">
                        <label for="thai">Thai</label>
                        <input type="checkbox" id="thai" name="cuisine[]" value="thai">
                    </div>
                </div>
            </div>

        </div>
        <div class="recipe-grid">
            <a class="recipe-card-link" href="/recipe?recipe_id=<?= $recipe['id'] ?>">
                <div class="recipe-card">
                    <img class="recipe-picture" src="public\images\chicken-wrap.jpg" alt="Chicken wrap">
                    <div class="recipe-meta">
                        <h3 class="recipe-title">Recipe name</h3>
                        <p class="recipe-description">Description</p>
                        <div class="recipe-info">
                            <div class="time-info">
                                <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                                <span> 30 mins</span>
                            </div>
                            <div class="difficulty-info">
                                <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                                <span>easy</span>
                            </div>
                        </div>
                        <div class="recipe-rating">
                            <img class="star-icon" src="public\images\star.png" alt="star-icon">
                            <span>4.5</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="public\scripts\filters.js"></script>
</body>
</html>
<template id="result-template">
    <a class="recipe-card-link" href="/recipe?recipe_id=<?= $recipe['id'] ?>">
        <div class="recipe-card">
            <img class="recipe-picture" src="public\images\chicken-wrap.jpg" alt="Chicken wrap">
            <div class="recipe-meta">
                <h3 class="recipe-title">Chicken wrap</h3>
                <p class="recipe-description">This warming vegan soup is made using juicy, ripe tomatoes, which come into season around September.</p>
                <div class="recipe-info">
                    <div class="time-info">
                        <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                        <span> 30 mins</span>
                    </div>
                    <div class="difficulty-info">
                        <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                        <span>easy</span>
                    </div>
                </div>
                <div class="recipe-rating">
                    <img class="star-icon" src="public\images\star.png" alt="star-icon">
                    <span>4.5</span>
                </div>
            </div>
        </div>
    </a>
</template>
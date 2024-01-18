<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\home.css">
    <link rel="stylesheet" href="public\styles\header.css">
    <script type="text/javascript" src="./public/scripts/redirect.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek home</title>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
    <div class="recommended-recipes">
        <h2 class="recipe-grid-title">Recommended</h2>
        <div class="recipe-grid">
            <?php foreach ($recommendedRecipes as $recipe): ?>
                <a class="recipe-card-link" href="/recipe?recipe_id=<?= $recipe['id'] ?>">
                    <div class="recipe-card">
                        <img class="recipe-thumbnail" src="public/uploads/<?= $recipe['image'] ?>" alt="<?= $recipe['title'] ?>">
                        <div class="recipe-meta">
                            <div class="recipe-title">
                                <div class="recipe-rating">
                                    <img class="star-icon" src="public\images\star.png" alt="star-icon">
                                    <span><?= $recipe['calculatedRating'] ?? 0; ?></span>
                                </div>
                                <h3><?= $recipe['title'] ?></h3>
                            </div>
                            <div class="recipe-info">
                                <div class="time-info">
                                    <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                                    <span> <?= $recipe['cook_time'] ?> mins</span>
                                </div>
                                <div class="difficulty-info">
                                    <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                                    <span><?= $recipe['level']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="recent-recipes">
        <h2 class="recipe-grid-title">Most recent recipes</h2>
        <div class="recipe-grid">
            <?php foreach ($mostRecentRecipes as $recipe): ?>
                <a class="recipe-card-link" href="/recipe?recipe_id=<?= $recipe['id'] ?>">
                    <div class="recipe-card">
                        <img class="recipe-thumbnail" src="public/uploads/<?= $recipe['image'] ?>" alt="<?= $recipe['title'] ?>">
                        <div class="recipe-meta">
                            <div class="recipe-title">
                                <div class="recipe-rating">
                                    <img class="star-icon" src="public\images\star.png" alt="star-icon">
                                    <span><?= $recipe['calculatedRating'] ?? 0; ?></span>
                                </div>
                                <h3><?= $recipe['title'] ?></h3>
                            </div>
                            <div class="recipe-info">
                                <div class="time-info">
                                    <img class="recipe-info-icon" src="public\images\time.svg" alt="time-icon">
                                    <span> <?= $recipe['cook_time'] ?> mins</span>
                                </div>
                                <div class="difficulty-info">
                                    <img class="recipe-info-icon" src="public\images\difficulty.svg" alt="difficulty-icon">
                                    <span><?= $recipe['level']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="public\scripts\sliders.js" defer></script>
</body>
</html>
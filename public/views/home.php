<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="src\styles\global.css">
    <link rel="stylesheet" href="src\styles\home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek home</title>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
        <div class="recommended-recipes">
            <h2 class="recipe-grid-title">Recommended</h2>
            <div class="recipe-grid">
                <div class="recipe-card">
                    <img class="recipe-thumbnail" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
                    <div class="recipe-meta">
                        <div class="recipe-title">
                            <div class="recipe-rating">
                                <img class="star-icon" src="src\images\star.png" alt="star-icon">
                                <span>4.5</span>
                            </div>
                            <h3>Chicken wrap</h3>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="recent-recipes">
            <h2 class="recipe-grid-title">Most recent recipes</h2>
            <div class="recipe-grid">
                <div class="recipe-card">
                    <img class="recipe-thumbnail" src="src\images\chicken-wrap.jpg" alt="Pumpkin soup">
                    <div class="recipe-meta">
                        <div class="recipe-title">
                            <div class="recipe-rating">
                                <img class="star-icon" src="src\images\star.png" alt="star-icon">
                                <span>4.5</span>
                            </div>
                            <h3>Pumpkin soup</h3>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="src\scripts\sliders.js"></script>
</body>
</html>
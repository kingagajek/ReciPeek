<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="src\styles\global.css">
    <link rel="stylesheet" href="src\styles\result.css">
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
        <div class="option-buttons">
            <select class="sort-button" name="sort" id="sort">
                <option value="rating-ASC">Rating: highest to lowest</option>
                <option value="rating-DESC">Rating: lowest to highest</option>
                <option value="time-ASC">Preparation time: highest to lowest</option>
                <option value="time-DESC">Preparation time: lowest to highest</option>
                <option value="ingredients-ASC">Total ingredients: lowest to highest</option>
                <option value="ingredients-DESC">Total ingredients: lowest to highest</option>
                <option value="difficulty-ASC">Difficulty: lowest to highest</option>
                <option value="difficulty-DESC">Difficulty: lowest to highest</option>
            </select>

            <button class="filter-button" id=filter-button>Filters</button>
            <div class="filter-menu" id="filter-menu" style="display:none;">  

                <div class="meal-type">
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

                <div class="total-time">
                    <button>Total time</button>
                    <div class="filter-options">
                        <div class="filter-option">
                            <label for="under-15m">Under 15 minutes</label>
                            <input type="checkbox" id="under-15m" name="time[]" value="0-15">
                        </div>
                        <div class="filter-option">
                            <label for="under-30m">16 - 30 minutes</label>
                            <input type="checkbox" id="under-30m" name="time[]" value="16-30">
                        </div>
                        <div class="filter-option">
                            <label for="under-45m">31 - 45 minutes</label>
                            <input type="checkbox" id="under-45m" name="time[]" value="31-45">
                        </div>
                        <div class="filter-option">
                            <label for="under-1h">46 - 60 minutes</label>
                            <input type="checkbox" id="under-1h" name="time[]" value="46-60">
                        </div>
                        <div class="filter-option">
                            <label for="more-than-1h">1 hour or more</label>
                            <input type="checkbox" id="more-than-1h" name="time[]" value="+60">
                        </div>
                    </div>
                </div>

                <div class="difficulty">
                    <button>Difficulty</button>
                    <div class="filter-options">
                        <div class="filter-option">
                            <label for="easy">Easy</label>
                            <input type="checkbox" id="easy" name="difficulty[]" value="easy">
                        </div>
                        <div class="filter-option">
                            <label for="more-effort">More effort</label>
                            <input type="checkbox" id="more-effort" name="difficulty[]" value="medium">
                        </div>
                        <div class="filter-option">
                            <label for="challenge">A challenge</label>
                            <input type="checkbox" id="challenge" name="difficulty[]" value="hard">
                        </div>
                    </div>
                </div>
    
                <div class="ratings">
                    <button>Ratings</button>
                    <div class="filter-options">
                        <div class="filter-option">
                            <label for="1-star">1 Star</label>
                            <input type="checkbox" id="1-star" name="rating[]" value="1-1.99">
                        </div>
                        <div class="filter-option">
                            <label for="2-star">2 Star</label>
                            <input type="checkbox" id="2-star" name="rating[]" value="2-2.99">
                        </div>
                        <div class="filter-option">
                            <label for="3-star">3 Star</label>
                            <input type="checkbox" id="3-star" name="rating[]" value="3-3.99">
                        </div>
                        <div class="filter-option">
                            <label for="4-star">4 Star</label>
                            <input type="checkbox" id="4-star" name="rating[]" value="4-4.99">
                        </div>
                        <div class="filter-option">
                            <label for="5-star">5 Star</label>
                            <input type="checkbox" id="5-star" name="rating[]" value="5">
                        </div>
                    </div>
                </div>

                <div class="additional-ingredients">
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

                <div class="diet">
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

                <div class="cuisine">
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

            <button class="ingredients-button" id=ingredients-button>Your ingredients</button>
            <div class="ingredients-menu" id="ingredients-menu" style="display:none;">  

                <div class="meal-type">
                    
                </div>
            </div>

        </div>

        <div class="recipe-grid">
            
            <div class="recipe-card">
                <img class="recipe-picture" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
                <div class="recipe-meta">
                    <h3 class="recipe-title">Chicken wrap</h3>
                    <p class="recipe-description">This warming vegan soup is made using juicy, ripe tomatoes, which come into season around September.</p>
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
                    <div class="recipe-rating">
                        <img class="star-icon" src="src\images\star.png" alt="star-icon">
                        <span>4.5</span>
                    </div>
                </div>
            </div>

            
            <div class="recipe-card">
                <img class="recipe-picture" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
                <div class="recipe-meta">
                    <h3 class="recipe-title">Chicken wrap</h3>
                    <p class="recipe-description">This warming vegan soup is made using juicy, ripe tomatoes, which come into season around September.</p>
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
                    <div class="recipe-rating">
                        <img class="star-icon" src="src\images\star.png" alt="star-icon">
                        <span>4.5</span>
                    </div>
                </div>
            </div>
            
            <div class="recipe-card">
                <img class="recipe-picture" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
                <div class="recipe-meta">
                    <h3 class="recipe-title">Chicken wrap</h3>
                    <p class="recipe-description">This warming vegan soup is made using juicy, ripe tomatoes, which come into season around September.</p>
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
                    <div class="recipe-rating">
                        <img class="star-icon" src="src\images\star.png" alt="star-icon">
                        <span>4.5</span>
                    </div>
                </div>
            </div>
            

            <div class="recipe-card">
                <img class="recipe-picture" src="src\images\chicken-wrap.jpg" alt="Chicken wrap">
                <div class="recipe-meta">
                    <h3 class="recipe-title">Chicken wrap</h3>
                    <p class="recipe-description">This warming vegan soup is made using juicy, ripe tomatoes, which come into season around September.</p>
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
                    <div class="recipe-rating">
                        <img class="star-icon" src="src\images\star.png" alt="star-icon">
                        <span>4.5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="src\scripts\checkboxes.js"></script>
</body>
</html>
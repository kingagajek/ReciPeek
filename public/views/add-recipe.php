<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\recipe.css">
    <link rel="stylesheet" href="public\styles\add-recipe.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciPeek result</title>
</head>
<body>
    <header>
        <img class="logo" src="public\images\logo.svg" alt="logo">
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

    <form class="main-container" action="addRecipe" method="post" ENCTYPE="multipart/form-data">
        <?php if(isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
            }
        }
        ?>
        <!-- Step 1: Recipe Information -->
        <div class="recipe-info-form step-1-of-3">
            <div class="upload-image">
                <!-- Image upload input -->
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="recipe-details">
                <!-- Recipe title input -->
                <input type="text" name="title" placeholder="Recipe name..." required>
                <!-- Recipe description input -->
                <textarea name="description" placeholder="Add recipe description..." required></textarea>
                <!-- Additional details: Time, Difficulty, Portions -->
                <input type="text" name="time" placeholder="Total time...">
                <input type="text" name="difficulty" placeholder="Difficulty...">
                <input type="number" name="portions" placeholder="Portions..." min="1">
            </div>
        </div>

        <!-- Step 2: Ingredients -->
        <div class="ingredients-form step-2-of-3">
            <h2>Ingredients</h2>
            <!-- Dynamically add ingredient fields using JavaScript or server-side rendering -->
            <!-- Example ingredient field -->
            <div class="ingredient-item">
                <input type="text" name="ingredients[]" placeholder="Ingredient...">
            </div>
            <!-- Add more ingredient fields as needed -->
        </div>

        <!-- Step 3: Instructions -->
        <div class="instructions-form step-3-of-3">
            <h2>Instructions</h2>
            <!-- Dynamically add instruction steps using JavaScript or server-side rendering -->
            <!-- Example instruction step field -->
            <div class="instruction-step">
                <textarea name="instructions[]" placeholder="Step 1: Preheat your oven..."></textarea>
            </div>
            <!-- Add more instruction steps as needed -->
        </div>

        <!-- Submit Button -->
        <button type="submit">Submit Recipe</button>
    </form>
</body>
</html>
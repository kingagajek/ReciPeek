<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="public\styles\admin.css">
    <link rel="stylesheet" href="public\styles\global.css">
    <script type="text/javascript" src="./public/scripts/admin.js" defer></script>
</head>
<body>
<header class="admin-header">
    <a href="/home"><img class="logo" src="public\images\logo.svg" alt="logo"></a>
    <div class="header-buttons">
        <img class="profile" src="public\images\profile.svg" alt="profile">
        <a href="/addRecipe"><img class="add-recipe-icon" src="public\images\plus.svg" alt="plus"></a>
    </div>
</header>

<main class="admin-main">
    <section class="admin-section">
        <h2>Manage Recipes</h2>
        <table class="admin-table" id="recipes-table">
            <!-- Dynamically filled with recipes -->
        </table>
    </section>

    <section class="admin-section">
        <h2>Manage Users</h2>
        <table class="admin-table" id="users-table">
            <!-- Dynamically filled with users -->
        </table>
    </section>
</main>
</body>
</html>

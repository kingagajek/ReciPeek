<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\edit-profile.css">
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

<main>
    <section class="profile-edit-section">
        <h1>Profile</h1>
        <form action="path_to_profile_update_script.php" method="post" enctype="multipart/form-data">
            <div class="profile-photo-container">
                <img src="public/uploads/profile_photo.jpg" alt="Profile Photo" class="profile-photo">
                <button type="button" onclick="document.getElementById('profile-photo-upload').click()">Change photo</button>
                <input type="file" id="profile-photo-upload" name="profile_photo" hidden>
                <button type="submit" name="delete_photo">Delete</button>
            </div>

            <div class="profile-info-container">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="Miller" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="suzan@gmail.com" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="******">
                <button type="button" onclick="changePassword()">Change</button>
            </div>

            <div class="profile-actions">
                <button type="submit" name="save_profile">Save</button>
                <button type="button" onclick="signOut()">Sign out</button>
                <button type="submit" name="delete_account" class="delete-account">Delete Account</button>
            </div>
        </form>
    </section>

    <!-- Tu mogą się znaleźć inne sekcje, np. zarządzanie przepisami użytkownika -->
</main>

</body>
</html>

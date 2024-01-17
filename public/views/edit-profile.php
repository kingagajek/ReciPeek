<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\edit-profile.css">
    <link rel="stylesheet" href="public\styles\header.css">
    <script type="text/javascript" src="./public/scripts/validation.js" defer></script>
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
        <?php if (isset($messages)): ?>
            <div class="edit-profile-message">
                <?= $messages ?>
            </div>
        <?php endif; ?>
        <h1>Profile</h1>
        <form method="post" enctype="multipart/form-data">
<!--            <div class="profile-photo-container">-->
<!--                <img src="public/uploads/profile_photo.jpg" alt="Profile Photo" class="profile-photo">-->
<!--                <button type="button" onclick="document.getElementById('profile-photo-upload').click()">Change photo</button>-->
<!--                <input type="file" id="profile-photo-upload" name="profile_photo" hidden>-->
<!--                <button type="submit" name="delete_photo">Delete</button>-->
<!--            </div>-->
            <div class="profile-info-container">
                <label for="username">Login</label>
                <input type="text" id="login" name="login" value="<?= $user->getLogin() ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $user->getEmail() ?>" required>

                <label for="password">Current password</label>
                <input type="password" name="currentPassword" value="">

                <label for="password">New password</label>
                <input type="password" name="password" value="">

                <label for="password">New password again</label>
                <input type="password" name="confirmedPassword" value="">
            </div>

            <div class="profile-actions">
                <button type="submit" name="save_profile">Save</button>
                <a class="sign-out" href="/logout">Sign out</a>
                <button type="submit" name="delete_account" class="delete-account">Delete Account</button>
            </div>
        </form>
    </section>
</main>

</body>
</html>

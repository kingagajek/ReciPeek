<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\login.css">
    <script type="text/javascript" src="./public/scripts/validation.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to ReciPeek</title>
</head>
<body>
    <div class="login-container">
        <a class="back-to-home" href="/home">
            <div class="logo-container">
                <img class="logo" src="public\images\logo.svg" alt="logo">
                <h1> Reci<span class="text-peach">Peek</span></h1>
            </div>
        </a>
        <div class="form-container">
            <form method="post" action="" class="login-form">
                <div class="form-inputs">
                    <input type="text" placeholder="Login" name="login" required>
                    <input type="text" placeholder="E-mail" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="password" placeholder="Password Again" name="confirmedPassword" required>
                </div>
                <button class="button-bg-gradient submit-button">Create account</button>
            </form>
        </div>
    </div>
</body>
</html>
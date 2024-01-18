<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public\styles\global.css">
    <link rel="stylesheet" href="public\styles\login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to ReciPeek</title>
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
            <form class="login-form" action="login" method="POST">
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="form-inputs">
                    <input type="text" placeholder="E-mail" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" id="remember-user" name="remember-user">
                    <label for="remember-user">Remember me</label>
                </div>
                <button class="button-bg-gradient submit-button" type="submit">LOG IN</button>
            </form>
            <a class="forgot-password-link" href="#">Forgot password?</a>  
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            padding:20px 0;
            display: flex;
            align-items: center;
            justify-content: center;

        }
    </style>
</head>
<body>
    
    <div class="login-box">
        <form action="checksignup.php" method="post">
        <div class="login-header">
            <header>Sign Up</header>
            <p>We are happy to have you back!</p>
        </div>
       
        <div class="input-box">
            <input type="email" name="email" class="input-field" id="email" autocomplete="off" required>
            <label for="email">E-mail</label>
        </div>
        <div class="input-box">
            <input type="password" name="password" class="input-field" id="password" autocomplete="off" required>
            <label for="password">Password</label>
        </div>
        <div class="forgot">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
            </section>
            <section>
                <a href="#" class="forgot-link">Forgot password?</a>
            </section>
        </div>
        <div class="input-box">
            <input type="submit" class="input-submit" value="Sign In">
        </div>
        <div class="middle-text">
            <hr>
            <p class="or-text">Or</p>
        </div>
        <div class="social-sign-in">
            <button class="input-google">
                 <img src="images/google.png" alt="">
                 <p>Sign In with Google</p>
            </button>
           
        </div>
        <div class="sign-up">
            <p>Don't have account <a href="#">Sign up</a></p>
        </div>
    </form>
        
    </div>

</body>
</html>
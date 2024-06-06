<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-size: cover;
            background-color: #f3f4f6; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #ffffff; 
            border-radius: 20px; 
            padding: 40px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); 
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .input-container {
            margin-bottom: 20px;
            position: relative;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #4a90e2; 
        }

        .error-message {
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }

        .submit-button {
            background-color: #4a90e2; 
            color: #ffffff; 
            border: none;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #357bd8; 
        }

        .forgot-password {
            text-align: center; 
            margin-top: 10px; 
        }

        .already-registered {
            text-align: center;
            margin-top: 10px;
        }

        .already-registered a {
            color: #4a90e2; 
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .already-registered a:hover {
            color: #357bd8; 
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        .google-login {
            background-color: white;
            border: 1px solid;
            color: darkgray;
            border-radius: 8px;
            padding: 3px;
            width: 97.5%;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            text-decoration: none; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .google-login:hover {
            background-color:#ccc;
        }

        .google-icon {
            margin-right: 10px; 
        }

        .login-icon {
            color: slategray;
            font-size: 32px;
            margin-bottom: 20px;
        }
        .svg-inline--fa.fa-w-16 {
            width: 2em;
            color: black;
        }

        svg:not(:root).svg-inline--fa {
            overflow: visible;
            margin-block-end: 3px;
        }

        .line-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .line {
            height: 1px;
            background-color: #ccc;
            width: 40%; 
        }

        .line-text {
            margin-left: 10px;
            margin-right: 10px;
            color: black;
        }

        p{
            text-align: center;
        }

        .img-google{
                width: 20px;
                height: 20px;
                margin: 7px;
            }
    </style>
</head>
<body style="background-image: url('dist/img/code.jpg');">
    <div class="form-container">
        <div class="form-title"><i class="fas fa-lock login-icon"></i> Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf         
            
            <div class="input-container">
                <input id="email" type="email" name="email" class="input-field" placeholder="Email" value="{{ old('email') }}" >
                <button type="button" class="toggle-password">
                    <i class="fas fa-user"></i>
                </button>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-container">
                <input id="password" type="password" name="password" class="input-field" placeholder="Password" >
                <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="submit-button">Login</button>
            
            <div class="line-container">
                <div class="line"></div>
                <span class="line-text"><b>Or</b></span>
                <div class="line"></div>
            </div>
           
            <a href="{{ route('google.login') }}" class="google-login">
                <img src="dist/img/google.jpg" alt="DK" class="img-google"> Login with Google
            </a>

            <div class="already-registered">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </div>

            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var icon = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>

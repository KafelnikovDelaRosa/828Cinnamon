<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>828 Page - Login</title>
    <link rel="icon" href="<?php echo base_url('images/828Logo.png') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            
        }
        input[type=password]::-ms-reveal,
        input[type=password]::-ms-clear
        {
            display: none;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("<?php echo base_url("images/background.jpg") ?>") no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 450px;
            background: white;
            border: 2px solid rgba(149, 20, 41, .5);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper .form-box {
            width: 100%;
            padding: 40px;
        }

        .form-box-logo {
            margin-bottom: 2em;
            text-align: center;
        }

        .form-box-logo img {
            width: 80px;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid rgb(149, 20, 41);
            margin: 30px 0;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: rgb(149, 20, 41);
            font-weight: 500;
            pointer-events: none;
            transition: .5s;
        }

        .input-box input:focus~label,.input-box input:valid~label{
            top: -5px;
        }
        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            font-weight: 600;
            color: rgb(149, 20, 41);
            padding: 0 35px 0 5px;
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            font-size: 1.2em;
            color: rgb(149, 20, 41);
            line-height: 57px;
            cursor: pointer;
        }

        #hide1 {
            display: none;
        }

        .remember-forgot {
            font-size: .9em;
            color: rgb(149, 20, 41);
            font-weight: 500;
            margin: -5px 0 15px;
            display: flex;
            justify-content: space-between;
        }

        .remember-forgot label input {
            accent-color: rgb(149, 20, 41);
            margin-right: 3px;
            cursor: pointer;
        }

        .remember-forgot a {
            color: rgb(149, 20, 41);
            text-decoration: none;
        }

        .remember-forgot a:hover {
            filter: brightness(0.5);
        }

        .btn {
            width: 100%;
            height: 45px;
            background-color: rgb(149, 20, 41);
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 500;
        }

        .login-register {
            font-size: .9em;
            color: rgb(149, 20, 41);
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: rgb(149, 20, 41);
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            filter: brightness(0.7);
        }
        .input-box small{
            position:absolute;
            display:block;
            margin-left:.5rem;
            color:rgb(149,20,41);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <div class="form-box-logo">
                <img src="<?php echo base_url('images/828Logo.png') ?>" alt="828">
            </div>
                <form action="login" method="post">
                    <div class="input-box">
                        <input type="text" name="username" required autocomplete="off">
                        <label>Username</label>
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required id="myInput">
                        <label>Password</label>
                        <span class="icon" onclick="myFunction()">
                            <ion-icon id="hide1" name="eye"></ion-icon>
                            <ion-icon id="hide2" name="eye-off"></ion-icon>
                        </span>
                        <small id="helpid" class="form-text text-muted">
                        <?php echo $_SESSION['login_err'] ?> 
                        </small>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">
                        stay signed in</label>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                    <div class="login-register">
                        <p><a href="register" class="register-link">CREATE ACCOUNT</a></p>
                    </div>
                </form>
            
        </div>
    </div>
    <script>
    function myFunction(){
        var x = document.getElementById("myInput");
        var y = document.getElementById("hide1");
        var z= document.getElementById("hide2");
        if(x.type=="password"){
          x.type = "text";
          y.style.display = "inline-block";
          z.style.display = "none";
        }
        else{
          x.type = "password";
          y.style.display = "none";
          z.style.display = "inline-block";
        }
    }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
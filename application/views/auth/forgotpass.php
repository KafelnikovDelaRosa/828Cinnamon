<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="icon" href="<?php echo base_url('images/828Logo.png') ?>">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
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
      width: 600px;
      height: 500px;
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
    .title-section {
      margin-bottom: 30px;
    }
    .title {
      color: rgb(149, 20, 41);
      font-size: 25px;
      font-weight: 700;
      text-transform: capitalize;
      margin-bottom: 10px;
    }
    .msg{
      color: rgb(149, 20, 41);
      font-size: 16px;
      font-weight: 600;
      line-height: 1.5;
      margin-bottom: 20px;
      padding-bottom: 20px;
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
  </style>
</head>
<body>
  <div class="wrapper">

    <div class="form-box fp">
      <div class="form-box-logo">
        <img src="<?php echo base_url('images/828logo.png') ?>" alt="828">
    </div>

    <div class="title-section">
      <h2 class="title">Reset Password</h2>
      <p class="msg">* If your Email matches an existing account we will send a password reset email within a few minutes. If you have not received an email check your spam folder.</p>
    </div>

      <form action="#">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input type="text" required>
          <label>
            Enter your Email
          </label>
        </div>
        <button type="submit" class="btn">Send Reset Email</button>
      </form>
    </div>

    </div>
  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
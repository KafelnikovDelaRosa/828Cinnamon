<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Password</title>
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
      width: 450px;
      height: 550px;
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
      font-weight: 700;
      line-height: 1.5;
      margin-bottom: 20px;
      padding-bottom: 20px;
    } 
    .field {
  position: relative;
  width: 100%;
  height: 50px;
  border-bottom: 2px solid rgb(149, 20, 41);
  margin: 30px 0;
}

.field label {
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

.field input:focus~label,.field input[data-visible="true"]~label{
      top:-5px;
    }

.field input {
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

.field .icon-eye {
  position: absolute;
  right: 8px;
  font-size: 1.2em;
  color: rgb(149, 20, 41);
  line-height: 57px;
  cursor: pointer;
}
    #hide1pass {
      display: none;
    }
    #hide1conpass{
      display:none;
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

    <div class="form-box cn">

      <div class="form-box-logo">
        <img src="<?php echo base_url('images/828logo.png') ?>" alt="828">
      </div>

      <div class="title-section">
      <h2 class="title">Create New Password</h2>
      <p class="msg">* Your new password must be different from previous used password.</p>
      </div>

      <form action="#">
      <div class="field create-password">
        <input type="password" name="password-input" class="pass-input" id="passInput" data-visible="false"/>
        <label>New Password</label>
        <span class="icon-eye eye1" onclick="passToggle()">
          <ion-icon id="hide1pass" name="eye"></ion-icon>
          <ion-icon id="hide2pass" name="eye-off"></ion-icon>
        </span>
        <small id="pass_err" class="form-text text-muted" data-visible="false"></small>
      </div>
      <div class="field confirm-password">
        <input type="password"  name="confpassword-input" class="confpass-input" id="confPassInput" data-visible="false"/>
        <label>Confirm Password</label>
        <span class="icon-eye eye2" onclick="confPassToggle()" disabled>
          <ion-icon id="hide1conpass" name="eye"></ion-icon>
          <ion-icon id="hide2conpass" name="eye-off"></ion-icon>
        </span>
        <small id="conpass_err" class="form-text text-muted"  data-visible="false"></small>
      </div>
      <button type="submit" class="btn" onclick="submitForm()">Submit</button>
      </form>

    </div>

  </div>


  <script>
    const confPassEvent=document.querySelector('.confpass-input');
    function checkConfPass(value){
      if(value.length==0){
         $("#conpass_err").text("Confirmed password is required!");
         $("#conpass_err").attr("data-visible","true");
         return false;
       }
      if(value==passEvent.value){
        $("#conpass_err").attr("data-visible","false");
      }
      else{
        $("#conpass_err").text("The confirm password does not match with the password");
        $("#conpass_err").attr("data-visible","true");
        return false;
      }
      
    }
    confPassEvent.addEventListener('change',()=>{
      let value=confPassEvent.value.trim();
      if(value!==""){
        confPassEvent.setAttribute("data-visible",true);
        passEvent.disabled=true;
        checkConfPass(value);
      }
      else{
        confPassEvent.setAttribute("data-visible",false);
        passEvent.disabled=false;
        $("#conpass_err").attr("data-visible","false");
      }
    });
    const passEvent=document.querySelector('.pass-input');
    passEvent.addEventListener('change',()=>{
      let value=passEvent.value.trim();
      if(value!==""){
        passEvent.setAttribute("data-visible",true);
        confPassEvent.disabled=false
      }
      else{
        passEvent.setAttribute("data-visible",false);
        confPassEvent.disabled=true;
      }
    });
    function passToggle(){
        var passInput = document.getElementById("passInput");
        var hide1pass = document.getElementById("hide1pass");
        var hide2pass = document.getElementById("hide2pass");
        if(passInput.type == 'password'){
            passInput.type = "text";
            hide1pass.style.display = "inline-block";
            hide2pass.style.display = "none";
        }
        else {
            passInput.type = "password";
            hide1pass.style.display = "none";
            hide2pass.style.display = "inline-block";
        }
    }
    function confPassToggle(){
        var conPassInput = document.getElementById("confPassInput");
        var hide1conpass = document.getElementById("hide1conpass");
        var hide2conpass = document.getElementById("hide2conpass");
        if(conPassInput.type == 'password'){
            conPassInput.type = "text";
            hide1conpass.style.display = "inline-block";
            hide2conpass.style.display = "none";
        }
        else {
            conPassInput.type = "password";
            hide1conpass.style.display = "none";
            hide2conpass.style.display = "inline-block";
        }
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
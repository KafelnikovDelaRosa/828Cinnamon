<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="register.css">
  <link rel="icon" href="<?php echo base_url('images/828Logo.png') ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <title>828 Page - Register</title>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    :root{
      --maroon:rgb(149,20,41);
    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("<?php echo base_url('images/background.jpg') ?>") no-repeat;
      background-size: cover;
      background-position: center;
    }
    input[type=password]::-ms-reveal,
    input[type=password]::-ms-clear
    {
        display: none;
    }
    .wrapper {
      position: relative;
      width: 400px;
      height: 600px;
      background: white;
      border: 2px solid rgba(149, 20, 41, .5);
      border-radius: 20px;
      backdrop-filter: blur(25px);
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
    /*username email field*/
    .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid var(--maroon);
    margin: 30px 0;
    }
    .input-box label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      font-size: 1em;
      color: var(--maroon);
      font-weight: 500;
      transition:top .5s;
    }
    .input-box input:focus~label,.input-box input[data-visible="true"]~label{
      top:-5px;
    }
    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1em;
      font-weight: 600;
      color:var(--maroon); 
      padding: 0 35px 0 5px;
    }
    .input-box .icon {
      position: absolute;
      right: 8px;
      font-size: 1.2em;
      color: var(--maroon);
      line-height: 57px;
    }
    /*password field*/
    .field {
      position: relative;
      width: 100%;
      height: 50px;
      border-bottom: 2px solid var(--maroon);
      margin: 30px 0;
    }

    .field label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      font-size: 1em;
      color: var(--maroon);
      font-weight: 500;
      pointer-events: none;
      transition: top .5s;
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
      color: var(--maroon);
      padding: 0 35px 0 5px;
    } 
    .field .icon-eye {
      position: absolute;
      right: 8px;
      font-size: 1.2em;
      color: var(--maroon);
      line-height: 57px;
      cursor: pointer;
    }

    #hide1pass {
    display: none;
    }
    #hide1conpass{
        display:none;
    }

    .agree {
      font-size: .9em;
      color: var(--maroon);
      font-weight: 500;
      margin: -15px 0 15px;
      display: flex;
      justify-content: space-between;
    }

    .agree label input {
      accent-color: var(--maroon);
      margin-right: 3px;
      cursor: pointer;
    }

    .agree a {
      color: var(--maroon);
      text-decoration: none;
    }

    .agree a:hover {
      filter: brightness(0.5);
    }

    .btn {
      width: 100%;
      height: 45px;
      background-color: var(--maroon);
      border: none;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1em;
      color: #fff;
      font-weight: 500;
    }

    .register-login {
      font-size: .9em;
      color: var(--maroon);
      text-align: center;
      font-weight: 500;
      margin: 25px 0 10px;
    }

    .register-login p a {
      color: var(--maroon);
      text-decoration: none;
      font-weight: 600;
    }

    .register-login p a:hover {
      filter: brightness(0.7);
    }
    .input-box small{
      position:absolute;
      display:block;
      margin-left:.5rem;
      color:rgb(149,20,41);
    }
    #email_err,#user_err,#pass_err,#conpass_err{
      font-size: .8em;
      /* (A2) COLORS */
      color: #fff;
      background: #a53d38;
      /* (A3) DIMENSIONS + POSITION */
      position: absolute;
      left:25em;
      bottom:0ch;
      padding: 10px;
      border-radius: 10px;
      width:250px;
      opacity:0%;
      transition:opacity .6s;
    }
    #email_err[data-visible="true"],#user_err[data-visible="true"],#pass_err[data-visible="true"],#conpass_err[data-visible="true"]{
      opacity:100%;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="form-box register">
      <div class="form-box-logo">
        <img src="<?php echo base_url('images/828Logo.png') ?>" alt="828">
      </div>
      <form action="<?php echo base_url("Register") ?>" id="submitForm" method="post">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input type="text" id="email" name="email" data-visible="false" autocomplete="off">
          <?php for($index=0;$index<count($emails);$index++){?>
            <input type="hidden" id="email-<?php echo $index?>" value="<?php echo $emails[$index] ?>">
          <?php } ?>
          <label>Enter Email</label>
          <small id="email_err" class="form-text text-muted" data-visible="false"></small>   
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input type="text" id="username" name="username"  data-visbile="false" autocomplete="off">
          <?php for($index=0;$index<count($usernames);$index++){?>
            <input type="hidden" id="user-<?php echo $index?>" value="<?php echo $usernames[$index] ?>">
          <?php } ?>
          <label>Enter Username</label>
          <small id="user_err" class="form-text text-muted" data-visible="false"></small>
        </div>
        <div class="field create-password">
          <input type="password" name="password-input" class="pass-input" id="passInput" data-visible="false"/>
          <label>Create Password</label>
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
        <div class="agree">
          <label><input type="checkbox" name="agreement" id="agree_err" value="false" required>
          I agree to the terms & conditions.</label>
      </div>
      <button type="submit" class="btn" onclick="submitForm()">Register</button>
      <div class="register-login">
        <p><a href="<?php echo base_url("Login") ?>" class="login-link">ALREADY HAVE AN ACCOUNT?</a></p>
      </div>
      </form>
    </div>
  </div>
  <script>
    //set up the list of the users for the registration
    var userList=[];
    var emailList=[];
    try {
      let count=0;
      let eod=false;
      while(!eod){
        const emailField=document.querySelector(`#email-${count}`);
        const emails=emailField.value;
        const userField=document.querySelector(`#user-${count}`);
        const userName=userField.value;
        userList.push(userName);
        emailList.push(emails);
        count++;
      } 
    }catch (err) {
      console.error(err);
    }
    function submitForm(){
      const myForm=document.querySelector('#submitForm');
      if(checkEmail(emailEvent.value.trim())==false){
        checkEmail(emailEvent.value.trim());
      }
      if(checkUsername(usernameEvent.value.trim())==false){
        checkUsername(usernameEvent.value.trim());
      }
      if(checkPassword(passEvent.value.trim())==false){
        checkPassword(passEvent.value.trim());
      }
      if(checkConfPass(confPassEvent.value.trim())==false){
        checkConfPass(confPassEvent.value.trim());
      }
      else{
        passEvent.disabled=false;
        confPassEvent.disabled=false;
        myForm.submit();
      }
    }
    const passEvent=document.querySelector('.pass-input');
    const passErr=document.querySelector("#pass_err");
    function checkPassword(value){
       let requirements=new Array();
       let regexNum=/[0-9]+/;
       if(value.length==0){
         passErr.textContent="Password is required!";
         passErr.setAttribute("data-visible",true);
         //$("#pass_err").text("Password is required!");
         //$("#pass_err").attr("data-visible","true");
         return false;
       }
       if(value.length<8){
         requirements.push("Minimun of 8 characters");
       }
       if(regexNum.test(value)==false){
         requirements.push("A number");
       }
       if(requirements.length==0){
          confPassEvent.disabled=false;
          passErr.setAttribute("data-visible",false);
          //$("#pass_err").attr("data-visible","false");
       }
       else{
         confPassEvent.disabled=true;
         passErr.textContent="Password Requirements: "+requirements;
         passErr.setAttribute("data-visible",true)
         //$("#pass_err").text("Password Requirements: "+requirements);
         //$("#pass_err").attr("data-visible","true");
         return false;
       }
    }
    passEvent.addEventListener('change',()=>{
      let value=passEvent.value.trim();
      if(value!==""){
        passEvent.setAttribute("data-visible",true);
        confPassEvent.disabled=false;
        checkPassword(value);
      }
      else{
        passEvent.setAttribute("data-visible",false);
        confPassEvent.disabled=true;
        passEvent.setAttribute("data-visible",false);
        //$("#pass_err").attr("data-visible","false");
      }
    });
    const confPassEvent=document.querySelector('.confpass-input');
    const conpassErr=document.querySelector('#conpass_err');
    function checkConfPass(value){
      if(value.length==0){
         conpassErr.textContent="Confirmed password is required!";
         conpassErr.setAttribute("data-visible",true);
         //$("#conpass_err").text("Confirmed password is required!");
         //$("#conpass_err").attr("data-visible","true");
         return false;
       }
      if(value==passEvent.value){
        conpassErr.setAttribute("data-visible",false);
        //$("#conpass_err").attr("data-visible","false");
      }
      else{
        conpassErr.textContent="The confirm password does not match with the password";
        conpassErr.setAttribute("data-visible",true);
        //$("#conpass_err").text("The confirm password does not match with the password");
        //$("#conpass_err").attr("data-visible","true");
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
        compassErr.setAttribute("data-visible",false);
        //$("#conpass_err").attr("data-visible","false");
      }
    });
    const emailEvent=document.querySelector("#email");
    const emailErr=document.querySelector("#email_err");
    function checkEmail(value){
      if(value.length==0){
         emailErr.textContent="Email is required!";
         emailErr.setAttribute("data-visible",true);
         //$("#email_err").text("Email is required!");
         //$("#email_err").attr("data-visible",true);
         return false;
       }
      if(emailList.includes(value)){
         emailErr.textContent="This email exists!";
         emailErr.setAttribute("data-visible",true);  
         //$("#email_err").text("This email exists!");
         //$("#email_err").attr("data-visible",true);
         return false;
      }
      if(!value.includes('@')){
        emailErr.textContent="Email must contain a '@' symbol";
        emailErr.setAttribute("data-visible",true); 
        //$("#email_err").text("Email must contain an '@' symbol");
        //$("#email_err").attr("data-visible",true);
        return false;
      }
      emailErr.setAttribute("data-visible",false);
      //$("#email_err").attr("data-visible",false);
    }
    emailEvent.addEventListener('change',()=>{
        let value=emailEvent.value.trim();
        if(value!==""){ 
          emailEvent.setAttribute("data-visible",true);
          checkEmail(value);
        }
        else{
          emailEvent.setAttribute("data-visible",false);
          emailErr.setAttribute("data-visible",false);
          //$("#email_err").attr("data-visible",false);
        }
    });
    function checkUsername(value){
        var regex = /^[a-zA-Z][a-zA-Z0-9]*$/;
        if(value.length==0){
         userErr.textContent="Username is required!";
         userErr.setAttribute("data-visible",true);
         //$("#user_err").text("Username is required!");
         //$("#user_err").attr("data-visible","true");
         return false;
       }
       if(userList.includes(value)){
         userErr.textContent="This username exists!";
         userErr.setAttribute("data-visible",true);
         //$("#user_err").text(`This username exists!`);
         //$("#user_err").attr("data-visible","true");
         return false;
       }
        if(regex.test(value)==false){
          userErr.textContent="Username input must start with a letter '[a-z] or [A-Z]'";
          userErr.setAttribute("data-visible",true);
          //$("#user_err").text("Username input must start with a letter '[a-z] or [A-Z]'");
          //$("#user_err").attr("data-visible","true");
          return false;
        }
        if(value.length<8){
          userErr.textContent="Username length should exceed at least 8";
          userErr.setAttribute("data-visible",true);
          //$("#user_err").text("Username length should exceed at least 8");
          //$("#user_err").attr("data-visible","true");
          return false;
        }
        userErr.setAttribute("data-visible",false);
        //$("#user_err").attr("data-visible","false");
    }
    const usernameEvent=document.querySelector("#username");
    const userErr=document.querySelector("#user_err");
    usernameEvent.addEventListener('change',()=>{
        let value=usernameEvent.value.trim();
        if(value!==""){ 
          usernameEvent.setAttribute("data-visible",true);
          checkUsername(value);
        }
        else{
          usernameEvent.setAttribute("data-visible",false);
          userErr.setAttribute("data-visible",false);
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
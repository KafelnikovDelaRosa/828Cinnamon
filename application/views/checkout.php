<!doctype html>
<html lang="en">
  <head>
    <title>828 Page - Checkout</title>
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="<?php echo base_url("CSS/style.css")?>" >
    <script src="https://kit.fontawesome.com/3ef3559250.js" crossorigin="anonymous"></script> 
  <style>
    .modal {
      position: fixed;
      display: flex;
      justify-content: center;
      width: 100%;
      height: 100vh;
      background-color: rgba(63, 63, 63, .5);
      opacity: 0;
      visibility: hidden;
      transition: opacity .4s;
    }
    .modal[data-visible="true"] {
      opacity: 1;
      visibility: visible;
    }

    :root{
      --mar:rgb(149, 20, 41);
      --bg-clr: #394168;
      --white: #fff;
      --title-clr: #394168;
      --pry-text-clr: #b3b3b3;
      --scn-text-clr: #838384;
      --btn-hvr-clr: #5363b0;
    }
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    section{
      padding:2rem;
    }
    .shadow {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
      }

      .profile-tab-nav {
        min-width: 250px;
      }

      .tab-content {
        flex: 1;
      }

      .form-group {
        margin-bottom: 1.5rem;
      }

      .nav-pills a.nav-link {
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        color: #333;
      }
      a .nav-link .active{
        background-color:#dc3545;
      }
      .img-circle img {
        height: 100px;
        width: 100px;
        border-radius: 100%;
        border: 5px solid #fff;
      }
      #exampleModal{
        position:absolute;
      }
      a{
        font-size:3rem;
      }
      a:hover{
        color:var(--mar);
      }
      nav{
        justify-content:flex-start;
      }
      h1 {
      text-align: center;
      }
    
    #receipt-mask{
      position:absolute;
      left:0;
      top:0;
      background-color:rgba(0,0,0,0.5);
      z-index:9999;
      width:100%;
      height:100vh;
    }
    .term-mask{
      position:absolute;
      top:0;
      left:0;
      min-height:100vh;
      width:100%;
      z-index:1;
      display:flex;
      justify-content:center;
      align-content:center;
      background-color: rgba(63, 63, 63, .5);
      visibility:hidden;
      transition:opacity .4s
    }
    .term-mask[data-visible="true"]{
      opacity: 1;
      visibility: visible;
    }
    .tc_main{
      position:relative;
      margin: 20px 0;
      width: 500px;
      max-width: 100%;
      height: 700px;
      background: var(--white);
      text-align: center;
    }

    .tc_main .title{
      color:var(--mar);
      margin-bottom: 5px;
      font-size: 24px;
      line-height: 32px;
      font-weight: 700;
      text-transform: uppercase;
      
    }

    .tc_main .tc_content .tc_bottom .title{
      font-size: 18px;
      line-height: 26px;
    }

    .tc_main .tc_content{
      width: 100%;
      margin: 35px 0;
      height: calc(550px - 150px);
    }

    .tc_main .tc_btns{
      width: 100%;
      height: 80px;
      padding: 21px 0;
      box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
    }

    .tc_main .tc_content .tc_top{
      margin: 0 35px 35px;
    }

    .tc_main .tc_content .tc_bottom{
      padding: 0 35px;
      overflow: auto;
      height: calc(100% - 150px);
    }

    .tc_main .tc_content .tc_top .icon{
      font-size: 42px;
      text-align: center;
      margin-bottom: 10px;
      color: var(--title-clr);
    }

    .tc_main .tc_content .tc_top .info{
      color: var(--scn-text-clr);
      text-align: justify;
      font-family: "Poppins", sans-serif !important;
      
    }

    .tc_main .tc_content .tc_bottom .info p{
      margin-bottom: 10px;
      text-align: justify;
      font-family: "Poppins", sans-serif !important;
    }

  </style>
</head>
  <body>
    <nav>
        <a href="<?php echo base_url('landing')?>" style="text-decoration:none">
          Back
        </a>
    </nav>
  <br>
  <div class="container">
      <div class="term-mask" id="toggle-term" data-visible="false">
        <div class="tc_main">
          <div class="tc_content">
            <div class="tc_top">
              <div class="icon">
                <img src="<?php echo base_url('images/828Logo2.png') ?>" width=80 height=80 alt="828pic">
              </div>
              <div class="title">
                <p>Terms and Conditions</p>
              </div>
              <div class="info">
                Welcome to 828 Cinnamon Rolls we are dedicated to providing you with a secure and enjoyable experience while safeguarding your privacy. Before using our services, 
            it is important for you to understand and agree to our Terms and Conditions and Privacy Policy. These documents outline the rules, rights, and responsibilities that govern the use of our website, applications, and any other services we offer.
              </div>
            </div>
            <div class="tc_bottom">
              <div class="title">
                <p>please go through the terms before Accepting it.</p>
              </div>
              <div class="info">
                <h3>Information We Collect</h3></br>
            <p>1.1. Personal Information: We may collect personal information, such as your name, email address, phone number, and shipping address when you place an order or interact with our website.</p>
                <p>1.2. Payment Information: We may collect payment information, such as credit card details or other financial information, to process your order and complete transactions.</p>
            <p>1.3. Usage Information: We may collect information about how you use our website, including your IP address, browser type, pages visited, and the duration of your visit.</p>
            </br>
            <h3>Use of Information</h3></br>
            <p>2.1. We use the information we collect to fulfill your orders, provide customer support, and improve our products and services.</p>
            <p>2.2. We may use your email address to send you promotional materials, updates, or newsletters, with your consent. You can opt-out of receiving such communications at any time.</p>
            <p>2.3. We do not sell, rent, or lease your personal information to third parties unless we have your permission or are required by law to do so.</p>
            </br>
            
            <h3>Data Security</h3></br>
            <p>3.1. We implement reasonable security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction.</p>
            <p>3.2. We use secure socket layer (SSL) technology to encrypt and transmit sensitive information during online transactions.</p>
            </br>
            
            <h3>Cookies and Tracking Technologies</h3></br>
            
            <p>4.1. We may use cookies and similar tracking technologies to enhance your experience on our website and to gather information about how you use our website.</p>
            <p>4.2  You can set your browser to refuse all or some browser cookies or to alert you when cookies are being sent. However, if you disable or refuse cookies, some parts of our website may not function properly.</p>
            </br>
            
            <h3>Third-Party Websites</h3></br>
            
            <p>5.1. Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of such websites. We encourage you to read the privacy policies of those websites before providing any personal information.</p>
                </br>
            
              <h3>Children's Privacy</h3></br>
            <p>6.1. Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under the age of 13. If we discover that we have collected personal information from a child under 13, we will promptly delete that information.</p>
                </br>
            
            <p>Changes to the Privacy Policy</p></br>
            <p>7.1. We reserve the right to modify or update this Privacy Policy at any time without prior notice. The revised Policy will be posted on our website with the updated date.</p>
                </br>
            <h3>Contact Us</h3></br>
            <p>8.1. If you have any questions, concerns, or requests regarding this Privacy Policy or the handling of your personal information, please contact us at [contact information].</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if(isset($_SESSION['username'])){?>
        <div class="py-5 text-center">
        <form action="<?php echo base_url('checkout/order/user')?>" method="post" >
          <h2>Information</h2>
        </div>
        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <?php $i=0;foreach($_SESSION['order'] as $product) {++$i;}?>
                <span class="badge badge-secondary badge-pill"><?php echo $i ?></span>
            </h4>
            <ul class="list-group mb-3">
              <?php $total=0;foreach($_SESSION['order'] as $product){;?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">X<?php echo $product->quantity." ".$product->name ;?></h6>
                  </div>
                  <span class="text-muted">₱<?php echo $product->price?></span>
                </li>
              <?php $total+=$product->quantity*$product->price;}?>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (PHP)</span>
                <strong><?php echo "₱".$total;?></strong>
              </li>
            </ul>
            <h6 class="mb-3">Terms and Agreement</h6>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" name="agreement" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">I have read and fully understand the contents of this document. I agree to the <a class="btn-open-term" aria-extended="false" style="font-size:1rem;color:var(--mar);text-decoration:underline" aria-controls="toggle-term">Terms and Conditions.</a></label>
              </div>
                <br><br>
              <button class="btn btn-primary btn-lg btn-" type="submit">Place Order</button>
          </div>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Customer Information</h4>
              <div class="row">
              </div>
              <input type="hidden" class="form-control" name="order"  id="order" value="<?php echo htmlspecialchars(json_encode(($_SESSION['order'])))?>">
              <input type="hidden" class="form-control" name="cost" value="<?php echo $total;?>">
              <?php foreach($user as $info){?>
              <div class="mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="email" class="form-control" style='color:black;' name="email" value="<?php echo $info->email?>" id="email">
                <div style="color:red;font-size:.9rem;" id="email-error">
                  <?php echo form_error("email")?>
                </div>
              </div>
              <?php }?>
              <div class="mb-3">
                <label for="phone">Phone <span class="text-muted"></span></label>
                <input type="text" class="form-control" name="phone" maxlength="11" style='color:black' value="<?php echo $info->phone?>" id="phone" placeholder="0923428111">
                <div style="color:red;font-size:.9rem;" id="phone-error">
                  <?php echo form_error("phone")?>
                </div>
              </div>
              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" style='color:black;' name="address" id="address" placeholder="1234 Main St" >
                <div style="color:red;font-size:.9rem;" id="address-error">
                  <?php echo form_error("address")?>
                </div>
              </div>
              <!--For h4 lagay mo Mode of delivery then under sa labels lagay mo lang yung Cash on Pickup -->
              <hr class="mb-4">
              <h4 class="mb-3">Mode of Payment</h4>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="pickup" name="deliveryMethod" type="radio" value="Cash on Pickup" class="custom-control-input"/>
                  <label class="custom-control-label" for="pickup">Cash on Pickup</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="delivery" name="deliveryMethod" type="radio" value="Cash on Delivery" class="custom-control-input"/>
                  <label class="custom-control-label" for="delivery">Cash on Delivery</label>
                </div>
              </div> 
              <hr class="mb-4" id="paymentLine" hidden="true">
              <h4 class="mb-3" id="paymentHead" hidden="true">Cash on Delivery </h4>
              <div class="d-block my-3" id="paymentBlock" hidden="true">
                <div class="custom-control custom-radio" id="cashContainer" hidden="true">
                  <input id="cash" name="paymentMethod" type="radio" class="custom-control-input"/>
                  <label class="custom-control-label" for="cash">Cash</label>
                </div>
                <div class="custom-control custom-radio" id="gContainer" hidden="true">
                  <input id="g-cash" name="paymentMethod" type="radio" class="custom-control-input"/>
                  <label class="custom-control-label" for="g-cash">G-Cash</label>
                </div>
              </div> 
            </form>
          </div>
      <?php } else{ ?>
      <div class="py-5 text-center">
      <form action="<?php echo base_url('checkout/order')?>" method="post" >
      <h2>Information</h2>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <?php $i=0;foreach($_SESSION['order'] as $product) {++$i;}?>
              <span class="badge badge-secondary badge-pill"><?php echo $i ?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php $total=0;foreach($_SESSION['order'] as $product){;?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">X<?php echo $product->quantity." ".$product->name ;?></h6>
                </div>
                <span class="text-muted">₱<?php echo $product->price?></span>
              </li>
            <?php $total+=$product->quantity*$product->price;}?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (PHP)</span>
              <strong><?php echo "₱".$total;?></strong>
            </li>
          </ul>
          <h6 class="mb-3">Terms and Agreement</h6>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" name="agreement" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">I have read and fully understand the contents of this document. I agree to the <a class="btn-open-term" aria-expanded="false" style="font-size:1rem;color:var(--mar);text-decoration:underline" aria-controls="toggle-term">Terms and Conditions.</a>Terms and Conditions.</a></label>
              </div>
                <br><br>
              <button class="btn btn-primary btn-lg" type="submit">Place Order</button>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Customer Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstname" id="firstname">
                <div style="color:red;font-size:.9rem;" id="firstname-error">
                  <?php echo form_error("firstname") ?>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
                <div style="color:red;font-size:.9rem;" id="lastname-error">
                  <?php echo form_error("lastname")?>
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="order"  id="order" value="<?php echo htmlspecialchars(json_encode(($_SESSION['order'])))?>">
            <input type="hidden" class="form-control" name="cost" value="<?php echo $total;?>">
            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div style="color:red;font-size:.9rem;" id="email-error">
                <?php echo form_error("email")?>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone">Phone <span class="text-muted"></span></label>
              <input type="text" class="form-control" name="phone" maxlength="11" id="phone" placeholder="0923428111">
              <div style="color:red;font-size:.9rem;" id="phone-error">
                <?php echo form_error("phone")?>
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" >
              <div style="color:red;font-size:.9rem;" id="address-error">
                <?php echo form_error("address")?>
              </div>
            </div>
            <!--For h4 lagay mo Mode of delivery then under sa labels lagay mo lang yung Cash on Pickup -->
            <hr class="mb-4">
              <h4 class="mb-3">Mode of Payment</h4>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="pickup" name="deliveryMethod" type="radio" value="Cash on Pickup" class="custom-control-input"/>
                  <label class="custom-control-label" for="pickup">Cash on Pickup</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="delivery" name="deliveryMethod" type="radio" value="Cash on Delivery" class="custom-control-input"/>
                  <label class="custom-control-label" for="delivery">Cash on Delivery</label>
                </div>
              </div> 
              <hr class="mb-4" id="paymentLine" hidden="true">
              <h4 class="mb-3" id="paymentHead" hidden="true">Cash on Delivery </h4>
              <div class="d-block my-3" id="paymentBlock" hidden="true">
                <div class="custom-control custom-radio" id="cashContainer" hidden="true">
                  <input id="cash" name="paymentMethod" type="radio" class="custom-control-input"/>
                  <label class="custom-control-label" for="cash">Cash</label>
                </div>
                <div class="custom-control custom-radio" id="gContainer" hidden="true">
                  <input id="g-cash" name="paymentMethod" type="radio" class="custom-control-input"/>
                  <label class="custom-control-label" for="g-cash">G-Cash</label>
                </div>
              </div> 
          </form>
        </div>
      <?php } ?>
  </div>
  <br><br><br><br><br><br>
    <!-- Optional JavaScript -->
    <script>
        const deliveryPrompt=document.querySelector("#delivery");
        const pickupPrompt=document.querySelector("#pickup");
        pickupPrompt.addEventListener('click',()=>{
          document.querySelector("#paymentLine").hidden=true;
          document.querySelector("#paymentHead").hidden=true;
          document.querySelector("#paymentBlock").hidden=true;
          document.querySelector("#cashContainer").hidden=true;
          document.querySelector("#cashContainer").value="";
          document.querySelector("#gContainer").hidden=true;
          document.querySelector("#gContainer").value="";
        })
        deliveryPrompt.addEventListener('click',()=>{
          document.querySelector("#paymentLine").hidden=false;
          document.querySelector("#paymentHead").hidden=false;
          document.querySelector("#paymentBlock").hidden=false;
          document.querySelector("#cashContainer").hidden=false;
          document.querySelector("#gContainer").hidden=false;
        });
        function toggleModalVisibility(modalId,button,attribute){
          const modal=document.querySelector(modalId);
          button.addEventListener("click",()=>{
            const visible=modal.getAttribute(attribute);
            modal.setAttribute(attribute, visible === "true" ? "false" : "true");
            button.setAttribute("aria-expanded", visible === "true" ? "false" : "true");
          });
        }
        const showTerm=document.querySelector(".btn-open-term");
        toggleModalVisibility("#toggle-term",showTerm,"data-visible");
        const closeTerm=document.querySelector(".term-mask");
        toggleModalVisibility("#toggle-term",closeTerm,"data-visible");
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
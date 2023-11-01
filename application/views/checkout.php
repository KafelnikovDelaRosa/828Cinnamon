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
  </style>
</head>
  <body>
    <nav>
        <a href="<?php echo base_url('Landing')?>" style="text-decoration:none">
          Back
        </a>
    </nav>
  <br>
  <div class="container">
      <?php if(isset($_SESSION['username'])){?>
        <div class="py-5 text-center">
        <form action="<?php echo base_url('Checkout/placeOrderUser') ?>" method="post" >
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
                <label class="custom-control-label" for="same-address">I have read and fully understand the contents of this document. I agree to the <a href="<?php echo base_url('Terms') ?>" style="font-size:1rem;">Terms and Conditions.</a></label>
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
                <input type="email" class="form-control" name="email" value="<?php echo $info->email?>" id="email">
                <div style="color:red;font-size:.9rem;" id="email-error">
                  <?php echo form_error("email")?>
                </div>
              </div>
              <?php }?>
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
      <?php } else{ ?>
      <div class="py-5 text-center">
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
                <label class="custom-control-label" for="same-address">I have read and fully understand the contents of this document. I agree to the <a href="<?php echo base_url('Terms') ?>" style="font-size:1rem;">Terms and Conditions.</a></label>
              </div>
                <br><br>
              <button class="btn btn-primary btn-lg" type="submit">Place Order</button>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Customer Information</h4>
          <form action="<?php echo base_url('Checkout/placeOrder') ?>" method="post" >
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
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>828 Faq Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo base_url('CSS/style.css') ?>">
  
  
<style>
	@import 
	url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
	);   
   body {
      font-family: "Poppins", sans-serif !important;
    }

    .faq-heading {
    border-bottom: #777;
    padding: 20px 60px;
	text-align: center;
	font-size: 35px;
    }

    .faq-container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    }

    .hr-line {
    width: 60%;
	margin: auto;
    }


    .faq-page {
    color: #666;
    cursor: pointer;
    padding: 30px 20px;
    width: 60%;
    border: none;
    outline: none;
    transition: 0.4s;
    margin: auto;
	text-align: center;
    }

    .faq-body {
    margin: auto;
    width: 50%;
	padding: auto;
    }

    .active,
    .faq-page:hover {
    background-color: #E0E0E0;
    }



    .faq-body {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
    }

    .faq-page:after {
    content: "\02795";
    font-size: 15px;
    color: #666;
    float: left;
    margin-left: 5px;
    }

    .active:after {
    content: "\2796";
    }

    body {background-color: #F8F8F8;
    }

 

    </style>
</head>

<body>
   <?php if(!isset($_SESSION['username'])){ ?>
      <nav class="navbar">
        <div class="logo">
          <img src="<?php echo base_url('images/828Logo2.png')?>">
        </div>
        <button class="toggle-menu"  aria-expanded= "false" aria-controls="toggle-choice"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="choices" id="toggle-choice" data-visible="false">
            <a href="<?php echo base_url("Landing")?>">Home</a>
            <a href="<?php echo base_url("Landing")?>">Products</a>
            <a href="<?php echo base_url("Landing")?>">Gallery</a>
            <a href="<?php echo base_url("Landing")?>">Contact</a>
          <button class="btnlogin-popup" onclick="window.location.href='<?php echo base_url('Login') ?>'">login</button>     
        </div>
        <div class="icon show-icon" style="display:flex;flex-direction:row;width:4em;align-items:center">
            <i class="fa-solid fa-cart-shopping toggle-shopping" style="font-size:1.5rem;" aria-expanded="false" aria-controls="toggle-cart"></i>
            <div class="product-counter" style="background:" data-visible="false"></div>
        </div>
      </nav>
    <?php } else { ?>
        <nav class="navbar">
          <div class="logo">
            <img src="<?php echo base_url('images/828Logo2.png')?>">
          </div>
          <button class="toggle-menu"  aria-expanded= "false" aria-controls="toggle-choice"><i class="fa fa-bars" aria-hidden="true"></i></button>
          <div class="choices" id="toggle-choice" data-visible="false">
            <a href="<?php echo base_url("Landing")?>">Home</a>
            <a href="<?php echo base_url("Landing")?>">Products</a>
            <a href="<?php echo base_url("Landing")?>">Gallery</a>
            <a href="<?php echo base_url("Landing")?>">Contact</a>
          </div>
          <div class="action" aria-controls="profile-menu" aria-expanded="false">
            <div class="profile">
              <img src="<?php echo ($_SESSION['profilepic']==null)?base_url('images/guest_pic.jpg'):base_url('uploads/'.$_SESSION['profilepic']);?>">
            </div>
            <div class="menu" id="profile-menu" data-visible="false">
              <ul>
                <li>
                  <a href="#"><?php echo $_SESSION['username'] ?></a> 
                </li>
                <li>
                  <i class="fa-sharp fa-solid fa-gear"></i>
                  <a href="<?php echo base_url('EditProfile') ?>">Edit Profile</a> 
                </li>
                <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="rgb(149, 20, 41)" class="bi bi-bag-fill" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                </svg>
                  <a href="<?php echo base_url('OrderHistory') ?>">Order History</a> 
                </li>
                <li>
                  <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                  <a href="<?php echo base_url('logout') ?>">logout</a> 
                </li>
              </ul>
            </div> 
          </div>
          <div class="icon show-icon" style="display:flex;flex-direction:row;width:6em;align-items:center">
            <i class="fa-solid fa-cart-shopping toggle-shopping" style="font-size:1.5rem;" aria-expanded="false" aria-controls="toggle-cart"></i>
            <div class="product-counter" style="background:" data-visible="false"></div>
            <i class="fas fa-bell" style="font-size:1.5rem;" onclick="window.location.href='<?php echo base_url('Notification')?>'"></i>
            <div class="product-counter" style="background:" data-visible="false"></div>
          </div>
        </nav>
    <?php } ?>
  <main>
    <section>
        <h1 class="faq-heading">Freqently Asked Questions / FAQ's</h1>

        <section class="faq-container">
		
		
		
        <div class="faq-one">

        <h3 class="faq-page">What are 828 cinnamon rolls?</h3>

            <div class="faq-body">

            <p>828 Cinnamon Rolls are a delicious baked treat made from a sweet, buttery dough filled with a mixture of cinnamon and sugar. They are often rolled into a spiral shape, baked to perfection, and served warm.
			These cinnamon rolls are loved for their comforting flavors and are enjoyed as a breakfast pastry or a sweet snack.</p>

            </div>

        </div>

        <hr class="hr-line">
		

        <div class="faq-one">

        <h3 class="faq-page">Are your cinnamon rolls made fresh?</h3>

            <div class="faq-body">

            <p>Yes, we take pride in baking our cinnamon rolls fresh daily. Each batch is carefully prepared to ensure the highest quality and taste. </p>

            </div>

        </div>

        <hr class="hr-line">

        
        
        <div class="faq-two">

            <h3 class="faq-page">What ingredients do you use in your cinnamon rolls?</h3>

            <div class="faq-body">

            <p>Our cinnamon rolls are made using premium ingredients, including high-quality flour, butter, cinnamon, sugar, and a secret blend of spices. We prioritize 
                using natural ingredients without any artificial additives or preservatives.</p>

            </div>

        </div>

        <hr class="hr-line">

        <div class="faq-three">

            <h3 class="faq-page">Do you offer gluten-free or vegan cinnamon rolls?</h3>

        <div class="faq-body">

            <p>Yes, we understand the dietary preferences and restrictions of our customers. We offer gluten-free options made with alternative flours, as well as 
            vegan cinnamon rolls made without any animal products. Please check our product listings for specific details.</p>

            </div>

        </div>
        
            <hr class="hr-line">
            
        <div class="faq-four">

            <h3 class="faq-page">How long do your cinnamon rolls stay fresh?</h3>

        <div class="faq-body">

            <p>Our cinnamon rolls are best enjoyed fresh out of the oven. To maintain their freshness, we recommend consuming them within 2-3 days of delivery. 
            If needed, you can store them in an airtight container or refrigerate them for a slightly extended shelf life.</p>

            </div>
        </div>
        
        <hr class="hr-line">
        
        <div class="faq-five">

            <h3 class="faq-page">Can I customize my cinnamon roll order?</h3>

        <div class="faq-body">

            <p>Absolutely! We understand that everyone has different preferences. We offer various customization options, including icing choices, extra toppings, and even the option to create your 
            own unique flavor combinations. Simply contact us or email us for those requests.</p>

            </div>
        </div>
        
        <hr class="hr-line">
        
        <div class="faq-five">

            <h3 class="faq-page">What payment methods do you accept?</h3>

        <div class="faq-body">

            <p>Currently we accept alternative payment methods such as Cash and G-Cash.</p>

            </div>
        </div>
        
        <hr class="hr-line">
        
            <div class="faq-five">

            <h3 class="faq-page">Do you offer refunds or returns?</h3>

        <div class="faq-body">

            <p>We want every customer to be satisfied with their purchase. If there is an issue with your order, please contact our customer support within 48 hours of receiving your package. 
                We will do our best to address the concern and find a suitable solution.</p>

            </div>
        </div>
        
        <hr class="hr-line">
        
                <div class="faq-five">

            <h3 class="faq-page">Can I send your cinnamon rolls as a gift?</h3>

        <div class="faq-body">

            <p>Absolutely! Our cinnamon rolls make a delightful gift for any occasion. During the checkout process, you can specify a different shipping address and include a 
            personalized message to be included with the package.</p>

            </div>
        </div>
        
        <hr class="hr-line">
		
	
                <div class="faq-five">

            <h3 class="faq-page">Steps on Ordering on our Website.</h3>

        <div class="faq-body">

            <p>1. Browse Products: The customer or user will choose what cinnamon rolls he or she wants to order.</br>
			   
			   </br>2. If the customer has decided to purchase the product, the user must click on the Add to Cart button.</br>
			   
			   </br>3. Checkout or Purchase Confirmation: If the customer has already reviewed his or her selected cinnamon rolls, 
			      A window will pop up, and the system will show the complete details, including the quantity and the total amount of his or her order. </br>
			   
			   </br>4. Payment Terms and Conditions: A pop-up window will appear. The customer should click the Pay button if he or she wants to proceed with 
			      the payment or transaction. </br>
					 
			   </br>5. Delivery Schedule/PPayment Method: After accepting the Terms and Conditions of Payment, the system will redirect the customer to a 
					 page where he or she is required to fill out the fields, including the following details:</br>
		           
				</br>a.Mode of Payment: Cash on Pickup or E-Wallet (G-Cash)

				</br>b.Grab or Lalamove

    			</br>c.Schedule of Delivery </br>
				
				</br>6. Reference No. - After completing filling out the necessary details the system will generate a random reference no. and it will be 
				sent via Email or SMS, after receiving the reference no. The customer will send this to the 828 Cinnamon Roll and will be used as proof of payment. </br>
				
				</br>7. Reference No. Confirmation - After receiving the reference number, 828 Cinnamon Roll will verify the reference number if it is a legitimate transaction 
				id. After confirmation, the company will send the confirmation to the customer that they have acknowledged the message. </br>


		
		
		
		
		
		</p>

            </div>
        </div>
        
        <hr class="hr-line">
		
        </section>
    </section>
  </main>
  <script>
var faq = document.getElementsByClassName("faq-page");
var i;
for (i = 0; i < faq.length; i++) {
  faq[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var body = this.nextElementSibling;
    if (body.style.display === "block") {
      body.style.display = "none";
    } else {
      body.style.display = "block";
    }
  });
}

  </script>

</body>

</html>


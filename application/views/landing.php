<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo base_url('CSS/style.css') ?>">
  <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <title>828 Landing page</title>
  <style>
    :root{
      --mar:rgb(149, 20, 41);
    }
    .body-cart{
      display:flex;
      flex-direction:column;
      justify-content:center;
      height:100%;
    }
    input[type="number"]{
      border:none;
      font-size:1rem;
      width:2em;
      text-align:center;
    }
    .addquantity{
      border:none;
    }
    .subquantity{
      border:none;
    }
    .list-empty {
      align-self:center;
    }
    .list-empty p{
      font-size:1.5rem;
      font-weight:900;
    }
    .btnlogin-popup {
      width: 15%;
      height: 50px;
      background: transparent;
      border: 2px solid rgb(149, 20, 41);
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      color: rgb(149, 20, 41);
      font-weight: 600;
      margin-left: 10px;
      transition: background-color .6s, box-shadow .6s,
      color .6s;
    }
    .btnlogin-popup:hover {
      background-color: rgb(149, 20, 41);
      color: #fff;
      opacity: .6s;
      box-shadow: 5px 5px 10px rgba(0, 0, 0, .6);
    }
    .btnlogin-popup:active {
      opacity: 0.4;
    }
    input[type="submit"],input[type="button"]{
      background-color:#8ab4f8;
      cursor:pointer;
      opacity:100%;
      transition:opacity .4s;
    }
    input[type="submit"]:hover,input[type="button"]:hover{
      opacity:75%;
    }
    #list-prompt[data-visible="true"],#list-empty-prompt[data-visible="true"]{
      justify-self:flex-start;
      visibility:visible;
    }
    #list-prompt[data-visible="false"],#list-empty-prompt[data-visible="false"]{
      visibility:hidden;
      position:absolute;
    }
    .product-counter[data-visible="false"]{
      visibility:hidden;
    }
    .product-counter[data-visible="true"]{
      visibility:visible;
    }
    .product-counter{
      background:var(--mar);
      width:50px;
      height:25px;
      font-size:1.1rem;
      border-radius:50%;
    }
    .footer-cart[data-visible="false"]{
      visibility:hidden;
    }
    .footer-cart[data-visible="true"]{
      visibility:visible;
    }
  </style>
  <script>
    var count=0;
    const imageText=[
      "Maple Pecan",
      "Matcha",
      "Choc Nutty",
      "Oreo Cream Cheese"
    ];
    document.addEventListener("DOMContentLoaded",()=>{
      const imageTextContent=document.querySelector("#image-text");
      imageTextContent.textContent=imageText[0];
      setInterval(()=>{
        count++;
        const food_1=document.querySelector("#food_1");
        const food_2=document.querySelector("#food_2");
        const food_3=document.querySelector("#food_3");
        const food_4=document.querySelector("#food_4");
        switch(count){
          case 1:{
            imageTextContent.textContent=imageText[1];
            food_1.style.transform="translateX(-500px)";
            food_2.style.transform="translateX(0px)";
            break;
          }
          case 2:{
            imageTextContent.textContent=imageText[2];
            food_2.style.transform="translateX(-500px)";
            food_3.style.transform="translateX(0px)";
            break;
          }
          case 3:{
            imageTextContent.textContent=imageText[3];
            food_3.style.transform="translateX(-500px)";
            food_4.style.transform="translateX(0px)";
            break;
          }
          default:{
            imageTextContent.textContent=imageText[0];
            food_1.style.transform="translateX(0px)";
            food_2.style.transform="translateX(500px)";
            food_3.style.transform="translateX(500px)";
            food_4.style.transform="translateX(500px)";
            break;
          }
        }
      },4000);
    });
  </script>
</head>
<body id="appbody">
    <?php if(!isset($_SESSION['username'])){ ?>
      <nav class="navbar">
        <div class="logo">
          <img src="<?php echo base_url('images/828Logo2.png')?>">
        </div>
        <button class="toggle-menu"  aria-expanded= "false" aria-controls="toggle-choice"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="choices" id="toggle-choice" data-visible="false">
          <a href="#main-page">Home</a>
          <a href="#product-page">Products</a>
          <a href="#gallery-page">Gallery</a>
          <a href="#contact-page">Contact</a>
          <button class="btnlogin-popup" onclick="window.location.href='login'">login</button>     
        </div>
        <div class="icon show-icon" style="display:flex;flex-direction:row;width:4em;align-items:center">
            <i class="fa-solid fa-cart-shopping toggle-shopping" style="font-size:1.5rem;" aria-expanded="false" aria-controls="toggle-cart"></i>
            <div class="product-counter" style="background:" data-visible="false"></div>
        </div>
      </nav>
    <?php } else { ?>
      <div class="header kenburns-top">
        <div class="text-focus-in">
          <img src="<?php echo base_url('images/828Logo2.png')?>" width=150 height=150 style="object-fit:contain;">
        </div>
        <p class="tracking-in-contract-bck">Welcome To 828 Cinnamon Rolls</p>
        <div class="down-arrow"></div>
      </div>
        <nav class="navbar">
          <div class="logo">
            <img src="<?php echo base_url('images/828Logo2.png')?>">
          </div>
          <button class="toggle-menu"  aria-expanded= "false" aria-controls="toggle-choice"><i class="fa fa-bars" aria-hidden="true"></i></button>
          <div class="choices" id="toggle-choice" data-visible="false">
            <a href="#main-page">Home</a>
            <a href="#product-page">Products</a>
            <a href="#gallery-page">Gallery</a>
            <a href="#contact-page">Contact</a>
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
                  <a href="account">Edit Profile</a> 
                </li>
                <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="rgb(149, 20, 41)" class="bi bi-bag-fill" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                </svg>
                  <a href="<?php echo base_url('orders') ?>">Order History</a> 
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
      <div class="cart-mask" id="toggle-cart" data-visible="false" aria-expanded="false" aria-controls="toggle-cart-2">
        <div class="cart-prompt" id="toggle-cart-2" data-visible="false">
          <div class="header-text">
            <h1><i class="fa-solid fa-cart-shopping"></i> Cart</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-square close-cart" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>  
          </div>
          <form id="myForm">
            <div class="body-cart" data-visible="false">
                <div class="list-empty" id="list-empty-prompt" data-visible="true">
                    <p style="text-align:center;">You Have Not Selected Any Products</p>
                    <center><input type="button" style="width:200px; height:50px; border:none;border-radius:50px" value="Continue Shopping" onclick="shop()"></center>
                </div>
                <div class="list" id="list-prompt" data-visible="false">
                  <table class="table" style="width:100%">
                        <thead class="thead-inverse">
                            <tr style="border-bottom:2px solid black">
                                <th>Quantity</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
              </div>
            <div class="footer-cart" style="display:flex; flex-direction:column;" data-visible="false">
                <div class="total-container" style="display:flex; justify-content:space-between"></div>
                <center><input id="submitButton" type="button" style="width:200px; height:50px; border:none;border-radius:50px" value="Proceed To Checkout"></center>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section id="main-page">
        <div class="main">
          <div class="main-text">
            <h1>Discover the<span>Taste</span><br>of Real<span>Cinnamon Rolls</span></h1>
            <p>
            the 828 cinnamon rolls are a delectable treat known for their irresistible aroma and heavenly taste. these cinnamon rolls are handcrafted with precision and care, ensuring a perfect balance of softness, fluffiness, and a delightful blend of flavors. each roll is generously filled with a luscious mixture of cinnamon, sugar, and butter, creating a mouthwatering swirl that unfolds with every bite.
            </p>
          </div>
          <div class="main-img">
            <img src="<?php echo base_url('images/main.jpg')?>">
          </div>
        </div>
      </section>
    <section id="product-page">
      <div class="product-text">
        <center>
            <p style="margin-left:3rem;">Our <span>Products<span></p>
        </center>
      </div>
      <div class="menu-box">
        <?php foreach($products as $product){ $item=array(
          'id'=>$product->productid,
          'quantity'=>1,
          'image'=>$product->productimage,
          'name'=>$product->productname,
          'price'=>$product->productcost
        );?>
        <div class="card-container" style="padding:2em;">
          <div class="card mx-auto" style="width:356px;height:700px;">
                <img class='mx-auto img-thumbnail'
                    src="<?php echo base_url('uploads/'.$product->productimage)?>"
                    width="100%" height="450"/>
                <div class="card-body" style="display:flex;align-items:center;flex-direction:column;flex-wrap:wrap">
                    <h2 class="card-title font-weight-bold"><?php echo $product->productname?></h5>
                    <p class="card-text" style="font-size:12px; padding:2em;"><?php echo $product->productdescription ?></p>
                    <p class="card-text" sytle="padding:2em;"><?php echo "₱".$product->productcost?></p>
                    <a style="text-decoration:none; padding:.4em; width:120px; cursor:pointer;height:40px;" class="btn" onclick='addCart(<?php echo json_encode($item);?>)'>ADD TO CART</a>
                </div> 
          </div>
        </div>
        <?php } ?>
      </div>
    </section>
    <br><br><br><br><br>
    <section id="gallery-page">
      <div class="gallery-text">
          <center>
            <p style="margin-left:3rem;">The <span>Gallery<span></p>
          </center>
      </div>
      <div class="display shadow-lg">
          <div class="text-box">
            <p id="image-text"></p>
          </div>
          <div class="images-show">
              <img src="<?php echo base_url('images/food 13.jpg')?>" id="food_1">
              <img src="<?php echo base_url('images/2nd.jpg')?>" id="food_2">
              <img src="<?php echo base_url('images/1st.jpg')?>" id="food_3">
              <img src="<?php echo base_url('images/4th.jpg')?>" id="food_4">
          </div>
      </div>
    </section>
    <br><br><br><br><br>
    <div class="contact-text">
          <center>
            <p style="margin-left:3rem;">Contact <span>Us<span></p>
          </center>
      </div>
    <section class="contact" id="contact-page">
    <div class="content">
      <div class="logo">
        <img src="<?php echo base_url('images/828Logo2.png')?>">
      </div>
      <p>Indulge in the blissful swirls of cinnamon and warmth, for every bite of a cinnamon roll is a moment of pure, sugary delight.</p>
    </div>
    <div class="container">
      <div class="contactInfo">
        <div class="box">
          <div class="icon">
            <ion-icon name="location-outline"></ion-icon>
          </div>
          <div class="text">
            <h3>Adress</h3>
          <p>Quezon City,<br>CBE Town 1 Riyal Street<br>1015</p>
          </div>
        </div>
        <div class="box">
          <div class="icon">
            <ion-icon name="mail-outline"></ion-icon>
          </div>
          <div class="text">
            <h3>Email</h3>
            <p>202010106@feudiliman.edu.ph</p>
          </div>
        </div>
        <div class="box">
          <div class="icon">
            <ion-icon name="call-outline"></ion-icon>
          </div>
          <div class="text">
            <h3>Phone</h3>
            <p>+639154054375</p>
          </div>
        </div>
      </div>
      <div class="contactForm">
        <form action="<?php echo base_url("ContactUs")?>" method="post">
          <h2>Contact Us</h2>
          <div class="inputBox">
            <input type="text" name="name" required="required">
            <span>Full Name</span>
          </div>
          <div class="inputBox">
            <input type="text" name="email" required="required">
            <span>Email</span>
          </div>
          <div class="inputBox">
            <textarea name="desc" required="required"></textarea>
            <span>Type your message here...</span>
          </div>
          <div class="inputBox">
            <input type="submit" value="Send">
          </div>
        </form>
      </div>
    </div>
    </section>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Savantz</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Services</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Affiliate Program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Get Help</h4>
          <ul>
            <li><a href="<?php echo base_url("Faq")?>">FAQ</a></li>
            <li><a href="#">shipping</a></li>
            <li><a href="#">returns</a></li>
            <li><a href="#">order status</a></li>
            <li><a href="#">payment options</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Online Shop</h4>
          <ul>
            <li><a href="#">White Cinnamon</a></li>
            <li><a href="#">Black Cinnamon</a></li>
            <li><a href="#">Red Cinnamon</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Follow Us</h4>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"<i></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
    var items=new Array();
    var total=0;
    const productCounter=document.querySelector(".product-counter");
    const navBar=document.querySelector('.navbar');
    const navigationHeight=navBar.offsetHeight;
    document.documentElement.style.setProperty(
      "--scroll-padding",
      navigationHeight+"px"
    );
    const sticky=navBar.offsetTop;
    const scrollBar=document.querySelector('#appbody')
    const toggleChoice=document.querySelector('#toggle-choice');
    const navButton=document.querySelector('.toggle-menu');
    const toggleCart=document.querySelector('#toggle-cart');
    const toggleCartList=document.querySelector('#toggle-cart-2');
    const cartButton=document.querySelector('.toggle-shopping');
    const closeCartButton=document.querySelector('.close-cart');
    const toggleProfileMenu=document.querySelector('#profile-menu');
    const profileButton=(document.querySelector('.action')===null)?"undefined":document.querySelector('.action');
    const cartPrompt=document.querySelector('#list-prompt');
    const cartBuyPrompt=document.querySelector('#list-empty-prompt');
    const counterPrompt=document.querySelector('.product-counter');
    const totalPrompt=document.querySelector('.footer-cart');
    window.onscroll=function(){myFunction()};
    function myFunction(){
      if(window.pageYOffset>=sticky){
        navBar.classList.add("sticky");
      }
      else{
        navBar.classList.remove("sticky");
      }
    }
    navButton.addEventListener('click',()=>{
       const visible=toggleChoice.getAttribute('data-visible'); 
       if(visible==="false"){
          toggleChoice.setAttribute('data-visible',true);
          navButton.setAttribute('aria-expanded',true);
       }
       else{
          toggleChoice.setAttribute('data-visible',false);
          navButton.setAttribute('aria-expanded',false);
       }
    });
    if(profileButton!=="undefined"){
        profileButton.addEventListener('click',()=>{
        const visible=toggleProfileMenu.getAttribute('data-visible');
        if(visible==="false"){
            toggleProfileMenu.setAttribute('data-visible',true);
            profileButton.setAttribute('aria-expanded',true);
        }
        else{
            toggleProfileMenu.setAttribute('data-visible',false);
            profileButton.setAttribute('aria-expanded',false);
        }
      });
    }
    cartButton.addEventListener('click',()=>{
      const visible=toggleCart.getAttribute('data-visible');
      scrollBar.classList.add('stop-scroll');
      if(visible==="false"){
        toggleCart.setAttribute('data-visible',true);
        cartButton.setAttribute('aria-expanded',true);
        toggleCartList.setAttribute('data-visible',true);
      }
    });
    closeCartButton.addEventListener('click',()=>{
      const visible=toggleCart.getAttribute('data-visible');
      scrollBar.classList.remove('stop-scroll')
      if(visible==="true"){
        toggleCart.setAttribute('data-visible',false);
        cartButton.setAttribute('aria-expanded',false);
        toggleCartList.setAttribute('data-visible',false);
      }
    });
    function shop(){
      toggleCart.setAttribute('data-visible',false);
      cartButton.setAttribute('aria-expanded',false);
      toggleCartList.setAttribute('data-visible',false);
    }

    function displayProduct(){
      let i=0;
      const tbody=document.querySelector("tbody");
      if(items.length===0){
        total=0;
        cartPrompt.setAttribute('data-visible',false);
        cartBuyPrompt.setAttribute('data-visible',true);
        totalPrompt.setAttribute('data-visible',false);
        counterPrompt.setAttribute('data-visible',false);
        return;
      }
      cartPrompt.setAttribute('data-visible',true);
      cartBuyPrompt.setAttribute('data-visible',false);
      totalPrompt.setAttribute('data-visible',true);
      counterPrompt.setAttribute('data-visible',true);
      productCounter.style.color="white";
      productCounter.textContent=items.length;
      if(tbody.querySelectorAll("tr")){
        const rows=tbody.querySelectorAll("tr");
        rows.forEach(row=>{
            row.remove();
        })
      }
      items.forEach(item=>{
        const row=document.createElement("tr");
        const quantityField=document.createElement("td");
        const buttonSub=document.createElement("button");
        buttonSub.setAttribute("onclick",`subQuantity(${i})`);
        buttonSub.type="button";
        buttonSub.textContent="-";
        const inputQuantity=document.createElement("input");
        inputQuantity.type="number";
        inputQuantity.value=item.quantity;
        inputQuantity.setAttribute("readonly",true);
        const buttonAdd=document.createElement("button");
        buttonAdd.setAttribute("onclick",`addQuantity(${i})`);
        buttonAdd.type="button";
        buttonAdd.textContent="+";
        quantityField.appendChild(buttonSub);
        quantityField.appendChild(inputQuantity);
        quantityField.appendChild(buttonAdd);
        const imageField=document.createElement("td");
        imageField.id="check-image";
        const image=document.createElement("img");
        image.src="<?php echo base_url('uploads/')?>"+item.image;
        image.width=70;
        image.height=70;
        imageField.appendChild(image);
        const nameField=document.createElement("td");
        nameField.class=`name-product-${i}`;
        nameField.id="check-name";
        nameField.textContent=item.name;
        const emptyField=document.createElement("td");
        const priceField=document.createElement("td");
        priceField.id="check-price";
        priceField.textContent="₱"+item.price;
        const trashIconField=document.createElement("td");
        const svg = document.createElementNS("http://www.w3.org/2000/svg","svg");
        svg.setAttribute("width", "20");
        svg.setAttribute("height", "20");
        svg.setAttribute("fill", "currentColor");
        svg.setAttribute("class", "bi bi-trash3");
        svg.setAttribute("viewBox", "0 0 16 16");
        svg.style.cursor="pointer";
        svg.setAttribute("onclick",`deleteItem(${i})`);
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("d", "M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z");
        svg.appendChild(path)
        trashIconField.appendChild(svg);
        row.appendChild(quantityField);
        row.appendChild(imageField);
        row.appendChild(nameField);
        row.appendChild(emptyField);
        row.appendChild(priceField);
        row.appendChild(trashIconField);
        tbody.appendChild(row);
        const totalContainer=document.querySelector(".total-container");
        totalContainer.innerHTML="<h1> Total </h1>"+`<h1 id='check-total'>₱${total}</h1>`;
        i++;
      });
    }
    const submitButton=document.querySelector('#submitButton');
    submitButton.addEventListener('click',()=>{
      var form=document.createElement('form');
      form.method='POST';
      form.action='checkout';
      var input=document.createElement('input')
      input.type='hidden';
      input.name="items";
      input.value=JSON.stringify(items);
      form.append(input);
      document.body.appendChild(form);
      form.submit();
    });
    function addCart(product){
      toggleCart.setAttribute('data-visible',true);
      cartButton.setAttribute('aria-expanded',true);
      toggleCartList.setAttribute('data-visible',true);
      if(!items.some(items=>items.name==product.name)){
        items.push(product);
        total+=Number(items[items.length-1].price);
        console.log(items);
        displayProduct();
      }
      else{
        itemIndex=items.findIndex(items=>items.name==product.name)
        addQuantity(itemIndex);
        console.log("Updated");
        console.log(items);
        displayProduct();
      }
    }
    function addQuantity(i){
      items[i].quantity+=1;
      total+=Number(items[i].price);
      displayProduct();
    }
    function subQuantity(i) {
      if (i >= 0 && i < items.length) {
        if (items[i].quantity > 1) {
          total -= Number(items[i].price);
          items[i].quantity -= 1;
          displayProduct();
        } 
        else {
          total -= Number(items[i].price);
          items.splice(i, 1);
          displayProduct();
        }
      } 
      else {
        displayProduct();
      }
    }
    function deleteItem(i){
      if(i>=0&&i<items.length){
        total-=Number(items[i].price);
        items.splice(i,1);
        console.log(items);
        displayProduct();
      }
      else{
        displayProduct();
      }
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
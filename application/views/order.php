<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .add-mask{
            position:fixed;
            justify-content:center;
            align-items:center;
            left:0;
            top:0;
            width:100%;
            height:100vh;
            display:flex;
            background-color:rgba(0,0,0,0.5);
            visibility:hidden;
        }
        .add-mask[data-visible="true"]{
            visibility:visible;   
        }
        .edit-mask{
            position:fixed;
            justify-content:center;
            align-items:center;
            left:0;
            top:0;
            width:100%;
            height:100vh;
            display:flex;
            background-color:rgba(0,0,0,0.5);
            visibility:hidden;
        }
        .edit-mask[data-visible="true"]{
            visibility:visible;   
        }
        /* Add padding to containers */
        form{
            position:relative;
            z-index:102;
        }
        .container {
            padding: 16px;
            width:700px;
            height:600px;
            background:white;
            overflow:scroll;
        }

        /* Full-width input fields */
        input[type=text], input[type=password], input[type=file],textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=number],select,input[type=date]{
            width:100%;
            padding:15px;
            margin:5px 0 22px 0;
            display:inline-block;
            border:none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        .registerbtn:hover {
        opacity:1;
        }

        /* Add a blue text color to links */
        a {
        color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
        background-color: #f1f1f1;
        text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <nav>
        <div class="logo">
                <img src="<?php echo base_url('images/guest_pic.jpg')?>">
                <p style="color:white; padding-left:5px;">Admin</p>
            </div>
            <div class="choices">
                <div class="selection" onclick="window.location.href='<?php echo base_url('Dashboard')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-speedometer" viewBox="0 0 16 16">
                    <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                    <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                    </svg>
                    <a href="#">Dashboard</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('BOM')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                    </svg>
                    <a href="#">BOM</a>
                </div>
                 <div class="selection" onclick="window.location.href='<?php echo base_url('Scheduling')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                    <a href="#">Scheduling</a>
                </div>
                <div class="selection"  onclick="window.location.href='<?php echo base_url('Inventory')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                    </svg>
                     <a href="#">Inventory</a>
                </div>
                <div class="selection"  onclick="window.location.href='<?php echo base_url('Products')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                    </svg>
                    <a href="#">Products</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Orders')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <a href="#">Orders</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Users')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                    <a href="#">Users</a>
                </div>
                 <div class="selection" onclick="window.location.href='<?php echo base_url('Alerts')?>'">
                    <i class="fas fa-bell fa-lg" style="color:white;"></i>
                    <a href="#">Alerts</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Logout')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <a href="">Logout</a>
                </div>
            </nav>
        <section>
            <p class="tagline">Orders</p>
            <div class="add-mask" id="add-prompt" data-visible="<?php echo (empty(validation_errors()))?'false':'true' ?>">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <form action="<?php echo base_url('Users/addUser') ?>" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <h1 style="display:flex; justify-content:space-between">
                            Add User   
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-square close-mask" aria-controls="add-prompt" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>  
                        </h1>
                        <p>Please fill in the fields for the user</p>
                        <hr>
                        <label for="psw-repeat"><b>Username</b><span style="color:red"><?php echo form_error("username")?></span></label>
                        <input type="text" name="username">
                         <label for="psw-repeat"><b>Email</b><span style="color:red"><?php echo form_error("email")?></span></label>
                        <input type="text" name="email">
                        <label for="psw-repeat"><b>Password</b><span style="color:red"><?php echo form_error("password-input")?></span></label>
                        <input type="password" name="password-input">
                        <label for="psw-repeat"><b>Confirm Password</b><span style="color:red"><?php echo form_error("confpassword-input")?></span></label>
                        <input type="password" name="confpassword-input">
                        <button type="submit" class="registerbtn">Add</button>
                    </div>
                </form>
            </div>
            <div class="edit-mask" data-visible="<?php echo (empty(validation_errors()))?'false':'true' ?>">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <form action="<?php echo base_url('Users/editUser') ?>" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <h1 style="display:flex; justify-content:space-between">
                            Edit User   
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-square close-edit-mask" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>  
                        </h1>
                        <p>Edit user information</p>
                        <hr>
                        <label for="image"><b>Profile Image </b><span style="color:red"><?php echo (empty(validation_errors()))?"":$file_err?></span></label>
                        <input type="file" name="filename" id="image">
                        <label for="email"><b>First Name</b><span style="color:red"><?php echo form_error("firstname")?></span></label>
                        <input type="text" name="firstname" id="firstname-edit" value="">
                        <label for="psw"><b>Last Name</b><span style="color:red"><?php echo form_error("lastname")?></span></label>
                        <input type="text" name="lastname" id="lastname-edit" value="">
                        <label for="psw-repeat"><b>Username</b><span style="color:red"><?php echo form_error("username")?></span></label>
                        <input type="text" name="username" id="username-edit" value="">
                        <label for="psw-repeat"><b>Email</b><span style="color:red"><?php echo form_error("email")?></span></label>
                        <input type="text" name="email" id="email-edit" value="">
                         <label for="psw-repeat"><b>Phone</b><span style="color:red"><?php echo form_error("phone")?></span></label>
                        <input type="text" name="phone" id="phone-edit" maxlength="11" value="">
                         <label for="psw-repeat"><b>Birthdate</b><span style="color:red"><?php echo form_error("birthday")?></span></label>
                        <input type="date" name="birthday" id="birthday-edit" value="">
                         <label for="psw-repeat"><b>Role</b><span style="color:red"><?php echo form_error("role")?></span></label>
                        <select name="role" id="role-edit">
                            <option selected="user">user</option>
                            <option>admin</option>
                            <option>baker</option>
                        </select>
                        <button type="submit" class="registerbtn">Update</button>
                    </div>
                </form>
            </div>
            <?php if(empty($orders)){ ?>
                <p class="tagline">There are no orders</p>
            <?php } else { ?>
                <br><br>
                <form action="<?php echo base_url("Orders/searchOrder")?>" id="myForm" method="post">
                    <input style="width:25%; background-color:white; border:1px solid black" name="referenceno" type="text" placeholder="Reference Id">
                    <svg type="submit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" onclick='document.getElementById("myForm").submit()'>
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </form>
                <table class="table table-striped table-inverse table-responsive"  >
                <thead class="thead-inverse">
                    <tr>
                        <th>Order ID</th> 
                        <th>Receipt Tag</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Cost</th>
                        <th>Mode of Payment</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($orders)){?>
                    <?php } ?>
                    <?php foreach($orders as $order){ $i=0;?>
                        <tr>
                            <td>
                                <?php echo $order->orderid?>
                            </td>
                            <!--<td><?php
                                $decodedata=json_decode($order->orders,true);
                                foreach($decodedata as $orders){
                                    echo $orders['quantity']." ".$orders['name']."<br>";
                                } 
                            ?></td>-->
                            <td><p id="recieptno" aria-controls="receipt-mask" aria-expanded="false"><?php echo $order->receiptno?></p></td>
                            <td><?php echo (is_null($order->firstname))?'...':$order->firstname ?></td>
                            <td><?php echo (is_null($order->lastname))?'...':$order->lastname ?></td>
                            <td><?php echo $order->email?></td>
                            <td><?php echo $order->phone?></p></td>
                            <td><?php echo "₱".number_format($order->cost,2)?></p></td>
                            <td><?php echo $order->paymentmode?></td>
                            <td><p id="statuscol"><?php echo $order->orderstatus?></p></td>
                            <td><?php echo $order->orderdate ?></td>
                            <td><?php echo $order->ordertime ?></td>
                            <?php if($order->orderstatus=="pending"){?>
                                <td>
                                    <button style="background-color:#c91e2f; color:white; width:100px;height:45px;cursor:pointer; border:none" onclick="window.location.href='<?php echo base_url('Orders/cancelOrder/'.$order->orderid) ?>'">Cancel</button>
                                    <button style="background-color:#188351; color:white; width:100px;height:45px;cursor:pointer; border:none" onclick="window.location.href='<?php echo base_url('Orders/completeOrder/'.$order->orderid) ?>'">Complete</button>
                                </td>
                            <?php } else {?>
                                <td>
                                    ...
                                </td>
                            <?php }?>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <?php } ?>
        </section>
        <script>
            const addModal=document.querySelector('#add-prompt');
            const toggleAdd=document.querySelector('.btn-add');
            const closeAddModal=document.querySelector('.close-mask');
            toggleAdd.addEventListener('click',()=>{
                const visible=addModal.getAttribute('data-visible');
                if(visible==="false"){
                    addModal.setAttribute('data-visible',true);
                    toggleAdd.setAttribute('aria-expanded',true);
                }
            });
            closeAddModal.addEventListener('click',()=>{
                const visible=addModal.getAttribute('data-visible');
                if(visible==="true"){
                    addModal.setAttribute('data-visible',false);
                    toggleAdd.setAttribute('aria-expanded',false);
                }
            });
            const editModal=document.querySelector(".edit-mask");
            const closeEditModal=document.querySelector('.close-edit-mask');
            closeEditModal.addEventListener('click',()=>{
                editModal.setAttribute('data-visible',false);
            });
            function setToDecimal(event){
                this.value=parseFloat(this.value).toFixed(2);
            }
            function editUser(user){
                editModal.setAttribute('data-visible',true);
                $("#firstname-edit").val(user.firstname);
                $("#lastname-edit").val(user.lastname);
                $("#username-edit").val(user.username);
                $("#email-edit").val(user.email);
                $("#phone-edit").val(user.phone);
                $("#birthday-edit").val(user.birthday);
                $("#role-edit").val(user.role);
            }
        </script>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
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
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <span>828 Admin</span>
            </div>
            <i class="fa-solid fa-bars" id = "btn"></i>
        </div>
        <div class="user">
            <img src = "<?php echo base_url('images/guest_pic.jpg')?>" alt="secret-user" class = "user-img">
            <div class="">
                <p class = "bold">Kafelnikov</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href = "<?php echo base_url('dashboard') ?>">
                    <i class="fa-solid fa-grip"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href = "<?php echo base_url('mrp') ?>">
                    <i class="fas fa-calendar"></i>
                    <span class="nav-item">MRP</span>
                </a>
                <span class="tooltip">MRP</span>
            </li>
            <li>
                <a href = "<?php echo base_url('inventory')?>">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="nav-item">Inventory</span>
                </a>
                <span class="tooltip">Inventory</span>
            </li>
            <li>
                <a href = "<?php echo base_url('products')?>">
                    <i class="fas fa-store-alt"></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href = "<?php echo base_url('order')?>">
                    <i class="fas fa-scroll"></i>
                    <span class="nav-item">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href = "<?php echo base_url('users')?>">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href = "<?php echo base_url('alerts')?>">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="nav-item">Alerts</span>
                </a>
                <span class="tooltip">Alerts</span>
            </li>
            <li>
                <a href = "<?php echo base_url('logout')?>">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
    <main> 
        <section>
            <p class="tagline">Users</p>
            <a aria-controls="add-prompt" style="display:flex; width:8em; align-items:center" aria-expanded="false" class="btn btn-primary text-white btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add User
            </a>
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
                        </select>
                        <button type="submit" class="registerbtn">Update</button>
                    </div>
                </form>
            </div>
            <?php if(empty($users)){ ?>
                <p class="tagline">User Table is Empty</p>
            <?php } else { ?>
                <br><br>
                <table class="table table-striped table-inverse table-responsive" >
                    <thead class="thead-inverse">
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Birthdate</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user){
                            $userData=array(
                                'firstname'=>(is_null($user->firstname))?'---':$user->firstname,
                                'lastname'=>(is_null($user->lastname))?'---':$user->lastname,
                                'username'=>$user->username,
                                'email'=>$user->email,
                                'phone'=>(is_null($user->phone))?'---':$user->phone,
                                'birthday'=>(is_null($user->birthday))?'---':$user->birthday,
                                'role'=>$user->role
                            );
                        ?>
                            <tr> 
                                <td><?php echo (is_null($user->firstname))?"---":$user->firstname ?></td>
                                <td><?php echo (is_null($user->lastname))?"---":$user->lastname ?></td>
                                <td><?php echo $user->username?></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo (is_null($user->phone))?"---":$user->phone; ?></td>
                                <td><?php echo (is_null($user->birthday))?"---":$user->birthday; ?></td>
                                <td><?php echo $user->role ?></td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;" width="25" height="25" fill="currentColor" onclick="window.location.href='<?php echo base_url("Users/removeUser/".$user->username)?>'" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" style="cursor:pointer;" onclick='editUser(<?php echo json_encode($userData);?>)' viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </section>
        <script>
            let btn = document.querySelector('#btn');
            let sidebar = document.querySelector('.sidebar');

            btn.onclick = function () {
                sidebar.classList.toggle('active');
            }
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
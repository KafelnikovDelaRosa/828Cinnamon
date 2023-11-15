<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - Inventory</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href = "<?php echo base_url('inventory/page/1')?>">
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
            <h2><a href="<?php echo base_url('inventory/page/1') ?>" class='header-link-group'>Inventory</a>>Add</h2>
            <div class="form-container">
                <h5>Material Information</h5>
                <form action="<?php echo base_url('inventory/add') ?>" method="POST">
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Code</p>
                            <input type="text" name="code" value="<?php echo set_value('code') ?>" class="input-form-group">
                            <small class="error-group"><?php echo form_error('code') ?></small>
                        </div>
                        <div class="input-group">
                            <p>Name</p>
                            <input type="text" name="name" value="<?php echo set_value('name') ?>"  class="input-form-group">
                            <small class="error-group"><?php echo form_error('name')?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Current Stocks</p>
                            <input type="number" onchange="handleNums('.num1')" name="current_stocks" value="<?php echo set_value('current_stocks')?>" class="input-form-group num1">
                            <small class="error-group"><?php echo form_error('current_stocks')?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Required Stocks</p>
                            <input type="number" onchange="handleNums('.num2')" name="stock_treshold" value="<?php echo set_value('stock_treshold')?>" class="input-form-group num2">
                            <small class="error-group"><?php echo form_error('stock_treshold') ?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Quantity</p>
                            <input type="number" onchange="handleNums('.num3')" name="quantity" value="<?php echo set_value('quantity')?>" class="input-form-group num3">
                            <small class="error-group"><?php echo form_error('quantity')?></small>
                        </div>
                        <div class="input-group">
                            <p>Unit</p>
                            <select name="unit">
                                <option value="kg">kg</option>
                                <option value="g">g</option>
                                <option value="ml">ml</option>
                                <option value="l">l</option>
                                <option value="pc">pc</option>
                                <option value="pcs">pcs</option>
                            </select>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Material Cost (₱)</p>
                            <input type="number" onchange="handleNums('.num4')" name="cost" value="<?php echo set_value('cost')?>" class="input-form-group num4">
                            <small class="error-group"><?php echo form_error('cost') ?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <button type="submit" class="input-form-group btn">Add Material</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
        function handleNums(numSelector){
            const numSelect=document.querySelector(numSelector);
            if(numSelect.value<0||numSelect.value.length==0){
                numSelect.value=0; 
            } 
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
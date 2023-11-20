<?php 
        if(!isset($_SESSION['useradmin'])){
            redirect('login','location');
        }
?>
<div class="sidebar">
    <div class="top">
        <div class="logo">
            <span>828 Admin</span>
        </div>
        <i class="fa-solid fa-bars" id ="btn"></i>
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
            <a href = "<?php echo base_url('products/page/1')?>">
                <i class="fas fa-box"></i>
                <span class="nav-item">Products</span>
            </a>
            <span class="tooltip">Products</span>
        </li>
        <li>
            <a href = "<?php echo base_url('order/page/1')?>">
                <i class="fas fa-scroll"></i>
                <span class="nav-item">Orders</span>
            </a>
            <span class="tooltip">Orders</span>
        </li>
        <li>
            <a href = "<?php echo base_url('users/page/1')?>">
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

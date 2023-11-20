<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .box-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 24px;
            margin-top: 36px;
        }
        .box-info li {
            padding: 24px;
            background: #fff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            grid-gap: 24px;
        }
        .box-info li .icon {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            font-size: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-info li:nth-child(1) .icon {
            background: #9cd7eb;
            color: #2a90b3;
        }
        .box-info li:nth-child(2) .icon {
            background: #ede889;
            color: #c1b933;
        }
        .box-info li:nth-child(3) .icon {
            background: #ffbe62;
            color: #ff8c00;
        }
        .box-info li:nth-child(4) .icon {
            background: #00a300;
            color: #00ff00;
        }
    </style>
</head>
<body>
    <?php $this->load->view('admin/sidetemplate');?>
    <main>
        <section id="content">
            <h1>Dashboard</h1>
            <ul class="box-info">
                <li>
                    <span class="icon">
                        <i class="bx fa-solid fa-basket-shopping"></i>
                    </span>                   
                    <span class="text">
                        <h3><?php echo $items?></h3>
                        <p>Total Items</p>
                    </span>
                </li>
                <li>
                    <span class="icon">
                        <i class="bx fa-solid fa-calendar-check"></i>
                    </span>                   
                    <span class="text">
                        <h3><?php echo $orders?></h3>
                        <p>Total Orders</p>
                    </span>
                </li>
                <li>
                    <span class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </span>                   
                    <span class="text">
                        <h3><?php echo $products?></h3>
                        <p>Total Products</p>
                    </span>
                </li>
                <li>
                    <span class="icon">
                        <i class="fa-solid fa-user-group"></i>
                    </span>                    
                    <span class="text">
                        <h3><?php echo $users?></h3>
                        <p>Users</p>
                    </span>
                </li>
                <li>
                    <span class="icon">
                        <i class="fa-solid fa-wallet"></i>
                    </span>                    
                    <span class="text">
                        <h3>₱<?php 
                            $total=0;
                            foreach($sales as $sale){
                                $total+=$sale->cost;
                            }
                            echo $total;
                        ?></h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
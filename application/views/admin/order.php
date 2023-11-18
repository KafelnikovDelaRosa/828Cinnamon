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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body>
    <?php 
        include('sidetemplate.php');
        include('crudtemplate.php'); 
    ?>
    <?php sideBar(); ?> 
    <main>
        <?php
            $config=array(
                'table_type'=>'order',
                'header'=>'Orders',
                'placeholder'=>'e.g firstname, lastname, email, phone, address, reference no.',
                'categories'=>array(
                    'all'=>'all',
                    'firstname'=>'firstname',
                    'lastname'=>'lastname',
                    'email'=>'email',
                    'phone'=>'phone',
                    'address'=>'address',
                    'cost'=>'cost'
                ),
                'category'=>$category,
                'filter_selection'=>$status,
                'filter_name'=>'Status',
                'filter_values'=>array(
                    'all',
                    'pending',
                    'completed',
                    'cancelled'
                ),
                'cur_page'=>$cur_page,
                'per_page'=>$per_page,
                'total_entries'=>$total_entries,
                'last_entries'=>$last_entries,
                'table_name'=>'Customer Summary',
                'table_headers'=>array('Id','Reference no.','Firstname','Lastname','Email','Phone','Address','Order Created','Order Completed','Order Cancelled','Cost','Payment Method','Status','Action'),
                'root_url'=>'order',
                'entry_keys'=>array('orderid','referenceno','firstname','lastname','email','phone','address','ordercreated','ordercompleted','ordercancelled','cost','paymentmode','orderstatus'),
                'entries' =>$entries
            );
            crud($config);
        ?>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
    </script>
    <?php  crudScript($config) ?>
</body>
</html>